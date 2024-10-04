<?php

declare(strict_types=1);

namespace App\Enum;

enum CommentStatusEnum : string
{
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';
}