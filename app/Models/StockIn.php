<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $table = 'stock_ins';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(StockInDetail::class);
    }

    public static function getNewCode()
    {
        $prefix = 'SI';
        $lastCode = self::query()
            ->orderBy('id', 'desc')
            ->value('code');

        if ($lastCode) {
            // Ambil angka terakhir dari kode (misal SPL001 -> 001)
            $lastNumber = intval(substr($lastCode, strlen($prefix)));
            $newNumber = $lastNumber + 1; // Tambahkan 1
        } else {
            // Jika belum ada data, mulai dari 1
            $newNumber = 1;
        }
        // Format angka menjadi tiga digit, misalnya 001, 002
        return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
}