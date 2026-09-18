<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user has admin role.
     */
    public function isAdmin(): bool
    {
        $normalized = strtolower(str_replace([' ', '-'], '_', (string) $this->role));
        return in_array($normalized, ['admin', 'super_admin']);
    }

    /**
     * Check if user has staff role.
     */
    public function isStaff(): bool
    {
        $normalized = strtolower(str_replace([' ', '-'], '_', (string) $this->role));
        return in_array($normalized, ['staff', 'concierge']);
    }

    /**
     * Check if user has customer role.
     */
    public function isCustomer(): bool
    {
        $normalized = strtolower(str_replace([' ', '-'], '_', (string) $this->role));
        return in_array($normalized, ['customer', 'user', 'member']);
    }

    /**
     * Check if user has one of the specified roles.
     */
    public function hasRole(string|array $roles): bool
    {
        if (is_string($roles)) {
            $roles = explode(',', $roles);
        }

        $roles = array_map(fn($r) => strtolower(str_replace([' ', '-'], '_', trim($r))), $roles);
        $userRole = strtolower(str_replace([' ', '-'], '_', (string) $this->role));
        
        if ($this->isAdmin() && (in_array('admin', $roles) || in_array('super_admin', $roles))) {
            return true;
        }

        if ($this->isStaff() && (in_array('staff', $roles) || in_array('concierge', $roles))) {
            return true;
        }

        if ($this->isCustomer() && (in_array('customer', $roles) || in_array('user', $roles) || in_array('member', $roles))) {
            return true;
        }

        return in_array($userRole, $roles);
    }

    /**
     * Get human-readable role label.
     */
    public function getRoleLabelAttribute(): string
    {
        $normalized = strtolower(str_replace([' ', '-'], '_', (string) $this->role));
        return match ($normalized) {
            'admin', 'super_admin' => 'Administrator',
            'staff', 'concierge' => 'Staff / Concierge',
            default => 'Customer / Member VIP',
        };
    }
}
