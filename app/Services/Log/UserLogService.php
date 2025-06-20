<?php

namespace App\Services\Log;

use App\Enums\CrudActionEnum;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class UserLogService
{

    public function __construct()
    {
    }

    public function log(Model $model, CrudActionEnum $action, array $data = []): void
    {
        if ($model instanceof User) {
            if ($action === CrudActionEnum::UPDATE) {
                unset($data['old']['password']);
                unset($data['new']['password']);
            }

            unset($data['password']);
        }


        UserLog::query()->create([
            'model_type' => get_class($model),
            'model_id' => $model->getKey(),
            'action' => $action->value,
            'data' => $data,
            'performed_by' => auth()->id() ?? 'system',
            'ip_address' => request()->header('X-Forwarded-For') ?? Request::ip(),
        ]);
    }
}
