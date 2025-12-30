<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GiftController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'template' => 'required|string',
            'price_cents' => 'required|integer|min:0'
        ]);

        $slug = Str::slug($data['title'] ?: Str::random(8)) . '-' . Str::random(6);

        $gift = Gift::create(array_merge($data, ['user_id' => $request->user()->id ?? null, 'slug' => $slug, 'is_paid' => false]));

        // handle uploads (photos/audio/video)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('gifts', 'public');
                $mimeType = $file->getMimeType();
                
                // Determine media type
                if (Str::startsWith($mimeType, 'audio/')) {
                    $type = 'audio';
                } elseif (Str::startsWith($mimeType, 'video/')) {
                    $type = 'video';
                } else {
                    $type = 'image';
                }
                
                Media::create(['gift_id' => $gift->id, 'type' => $type, 'path' => $path]);
            }
        }

        $gift->load('media');
        return response()->json(['gift' => $gift]);
    }

    public function show($slug)
    {
        $gift = Gift::where('slug', $slug)->with('media')->firstOrFail();

        // If the gift hasn't been paid, don't expose the template or media
        if (! ($gift->paid ?? false)) {
            $gift->template = null;
            $gift->setRelation('media', collect([]));
            return response()->json([
                'gift' => $gift,
                'paid' => false,
                'message' => 'Presente não pago'
            ]);
        }

        return response()->json(['gift' => $gift, 'paid' => true]);
    }

    public function index(Request $request)
    {
        $gifts = Gift::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->with('media')
            ->get();
        
        return response()->json(['gifts' => $gifts]);
    }
}
