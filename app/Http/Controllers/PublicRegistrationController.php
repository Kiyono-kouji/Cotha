<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Registration;

class PublicRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $class = ClassModel::find($request->class_id);
        $request->merge([
            'class_title' => $class ? $class->title : 'Let COTHA Choose',
            'class_level' => $class ? $class->level : 'Let COTHA Choose',
        ]);

        $data = $request->validate([
            'class_id' => 'required|integer',
            'class_title' => 'required|string|max:255',
            'class_level' => 'required|string|max:64',
            'child_name' => 'required|string|max:255',
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'school' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'wa' => ['required', 'regex:/^\+?\d{9,15}$/'],
            'language' => 'required|string|max:32',
            'coding_experience' => 'required|string|max:64',
            'note' => 'nullable|string',
        ]);

        // Store in DB
        Registration::create($data);

        // Build WhatsApp message
        $lines = [
            'Hi COTHA,',
            '',
            'Saya ingin daftar kelas:',
            $data['class_title'].' ('.$data['class_level'].')',
            'Nama Anak: '.$data['child_name'],
            'Tanggal Lahir: '.$data['dob'],
            'Sekolah: '.($data['school'] ?? '-'),
            'Kota: '.($data['city'] ?? '-'),
            'WA: '.$data['wa'],
            'Bahasa: '.($data['language'] ?? '-'),
            'Sudah pernah belajar coding?: '.($data['coding_experience'] ?? '-'),
            isset($data['note']) && $data['note'] !== '' ? 'Catatan/Question: '.$data['note'] : null,
        ];
        $text = urlencode(implode("\n", array_filter($lines)));
        $phone = '+6281234332110';

        // Redirect to WhatsApp
        $url = 'https://api.whatsapp.com/send/?phone='.urlencode($phone).'&text='.$text.'&app_absent=0';
        return redirect()->away($url);
    }

    public function show()
    {
        $classes = ClassModel::all();
        return view('registertrial', compact('classes'));
    }
}