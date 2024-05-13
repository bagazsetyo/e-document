<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\DokumenFile;
use Kuliah\ManagementDocument\Models\JenisPengguna;
use Kuliah\ManagementDocument\Models\Pengguna;
use Kuliah\ManagementDocument\Models\Setting;
use Kuliah\ManagementDocument\Models\User;
use Kuliah\ManagementDocument\Models\UserRole;

class HomeService
{
    public function index()
    {
        $user = User::model()->select(['count(*) as total'])->first();
        $document = Dokumen::model()->select(['count(*) as total'])->first();
        $documentFile = DokumenFile::model()->select(['count(*) as total'])->first();
        $pengguna = Pengguna::model()->select(['count(*) as total'])->first();
        $jenisPengguna = JenisPengguna::model()->select(['count(*) as total'])->first();
        $setting = Setting::model()->select(['count(*) as total'])->first();

        return [
            'user' => $user->total,
            'document' => $document->total,
            'documentFile' => $documentFile->total,
            'pengguna' => $pengguna->total,
            'jenisPengguna' => $jenisPengguna->total,
            'setting' => $setting->total,
        ];
    }
}
