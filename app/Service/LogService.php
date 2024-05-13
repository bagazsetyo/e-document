<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Log;
use Kuliah\ManagementDocument\Models\User;

class LogService
{
    public function index()
    {
        $request = requestGet();
        $log = Log::model()->join('inner','user', 'user.id = logtw.user_id');

        if(requestGet('search')) {
            $log = $log->where('time', 'like', '%'.$request->search.'%')
                            ->orWhere('user.name', 'like', '%'.$request->search.'%')
                            ->orWhere('ip_address', 'like', '%'.$request->search.'%')
                            ->orWhere('information', 'like', '%'.$request->search.'%');
        }

        $log = $log->orderBy('logtw.id','desc')->paginate(10);
        return $log;
    }
}
