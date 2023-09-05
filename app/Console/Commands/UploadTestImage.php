<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UploadTestImage extends Command
{
    protected $signature = 'test:upload-image';

    protected $description = 'Upload a test image to S3';

    public function handle()
    {
        

        $testImagePath = public_path('irasutoya.webp');  // 適当なテスト画像をpublicディレクトリに置く

        $s3Path = Storage::disk('s3')->putFile('test-images', $testImagePath, 'public');  // S3の'test-images'ディレクトリにアップロード

    }
    
}