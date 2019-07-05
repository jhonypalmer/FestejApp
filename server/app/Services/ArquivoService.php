<?php

namespace App\Services;

use App\Models\Arquivo;

class ArquivoService extends AbstractService
{
    protected $model = Arquivo::class;
    private $filePath;

    public function __construct()
    {
        $this->filePath = base_path('public/files');
        if (!is_dir($this->filePath)) {
            mkdir($this->filePath);
        }
    }

    public function uploadFile(\Illuminate\Http\UploadedFile $file)
    {
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $name = str_replace('.'.$ext, '', $name);
        $name .= '-'.rand(100, 999).'.'.$ext;

        $file->move($this->filePath, $name);
        return $this->create([
            'mime' => $file->getClientMimeType(),
            'fullname' => $name,
        ]);
    }
}