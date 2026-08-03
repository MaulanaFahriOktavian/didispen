<?php

namespace App\Enums;

enum IsActiveStatus: int
{
    case Active = 1;
    case Inactive = 0;

    public function label(): string
    {
        return match($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
        };
    }

    public function badgeClass(): string
    {
        return match($this) {
            self::Active => 'bg-[#22C55E]/10 text-[#22C55E] border-[#22C55E]/20',
            self::Inactive => 'bg-[#6B7280]/10 text-[#6B7280] border-[#6B7280]/20',
        };
    }
}