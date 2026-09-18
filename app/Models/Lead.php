<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'handle',
        'platform',
        'contact',
        'target_brand',
        'target_category',
        'raw_inquiry',
        'budget_max',
        'matched_product_id',
        'matched_product_title',
        'matched_product_price',
        'matched_product_image',
        'status',
        'notes',
        'outreach_message',
    ];

    /**
     * Helper to format budget in Rupiah.
     */
    public function getBudgetFormattedAttribute(): string
    {
        if (!$this->budget_max) {
            return '-';
        }
        return 'Rp ' . number_format($this->budget_max, 0, ',', '.');
    }

    /**
     * Helper to format matched product price in Rupiah.
     */
    public function getMatchedPriceFormattedAttribute(): string
    {
        if (!$this->matched_product_price) {
            return '-';
        }
        return 'Rp ' . number_format($this->matched_product_price, 0, ',', '.');
    }

    /**
     * Get direct outreach URL (WhatsApp wa.me or Social Media Profile / DM link)
     */
    public function getOutreachUrlAttribute(): string
    {
        $contactDigits = preg_replace('/[^0-9]/', '', (string) $this->contact);
        $encodedMsg = urlencode($this->outreach_message ?: '');

        if (strlen($contactDigits) >= 9) {
            if (str_starts_with($contactDigits, '0')) {
                $contactDigits = '62' . substr($contactDigits, 1);
            }
            return "https://wa.me/{$contactDigits}?text={$encodedMsg}";
        }

        $cleanHandle = ltrim($this->handle ?: '', '@');
        if ($this->platform === 'instagram' && $cleanHandle) {
            return "https://instagram.com/{$cleanHandle}";
        } elseif ($this->platform === 'twitter' && $cleanHandle) {
            return "https://x.com/{$cleanHandle}";
        } elseif ($this->platform === 'carousell' && $cleanHandle) {
            return "https://www.carousell.co.id/u/{$cleanHandle}";
        } elseif ($this->platform === 'tiktok' && $cleanHandle) {
            return "https://www.tiktok.com/@{$cleanHandle}";
        }

        return "https://wa.me/?text={$encodedMsg}";
    }

    /**
     * Check if lead has valid direct WhatsApp phone number.
     */
    public function getHasWhatsAppAttribute(): bool
    {
        $digits = preg_replace('/[^0-9]/', '', (string) $this->contact);
        return strlen($digits) >= 9;
    }

    /**
     * Get platform badge styling and icon.
     */
    public function getPlatformInfoAttribute(): array
    {
        $platforms = [
            'instagram' => ['name' => 'Instagram', 'icon' => '📸', 'color' => 'bg-pink-100 text-pink-700 border-pink-200'],
            'twitter' => ['name' => 'X (Twitter)', 'icon' => '🐦', 'color' => 'bg-sky-100 text-sky-700 border-sky-200'],
            'carousell' => ['name' => 'Carousell', 'icon' => '🛍️', 'color' => 'bg-rose-100 text-rose-700 border-rose-200'],
            'tiktok' => ['name' => 'TikTok Shop', 'icon' => '🎵', 'color' => 'bg-slate-100 text-slate-800 border-slate-300'],
            'facebook' => ['name' => 'Facebook FJB', 'icon' => '👥', 'color' => 'bg-blue-100 text-blue-700 border-blue-200'],
            'whatsapp' => ['name' => 'WhatsApp CS', 'icon' => '💬', 'color' => 'bg-emerald-100 text-emerald-700 border-emerald-200'],
        ];

        return $platforms[$this->platform] ?? ['name' => ucfirst($this->platform), 'icon' => '🌐', 'color' => 'bg-gray-100 text-gray-700 border-gray-200'];
    }

    /**
     * Get status badge styling.
     */
    public function getStatusInfoAttribute(): array
    {
        $statuses = [
            'new' => ['label' => 'Prospek Baru 🔥', 'class' => 'bg-amber-50 text-amber-700 border-amber-200'],
            'contacted' => ['label' => 'Sudah Dihubungi 💬', 'class' => 'bg-blue-50 text-blue-700 border-blue-200'],
            'interested' => ['label' => 'Tertarik / Follow-up ⏳', 'class' => 'bg-purple-50 text-purple-700 border-purple-200'],
            'closed' => ['label' => 'Deal Pre-Order 👑', 'class' => 'bg-emerald-50 text-emerald-700 border-emerald-200'],
            'lost' => ['label' => 'Batal / Tidak Cocok ❌', 'class' => 'bg-slate-100 text-slate-500 border-slate-200'],
        ];

        return $statuses[$this->status] ?? ['label' => ucfirst($this->status), 'class' => 'bg-gray-50 text-gray-700 border-gray-200'];
    }
}
