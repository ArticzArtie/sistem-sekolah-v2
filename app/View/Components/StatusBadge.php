<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class StatusBadge extends Component
{
    public string $label;
    public string $colorClasses;

    public function __construct(public string $status)
    {
        $this->label = $this->status;
        $this->colorClasses = $this->resolveColorClasses($this->status);
    }

    protected function resolveColorClasses(string $status): string
    {
        return match (strtolower($status)) {
            'aktif' => 'border-green-200 bg-green-50 text-green-700',
            'tidak aktif' => 'border-red-200 bg-red-50 text-red-700',
            default => 'border-slate-200 bg-slate-50 text-slate-600',
        };
    }

    public function render(): View
    {
        return view('components.status-badge');
    }
}