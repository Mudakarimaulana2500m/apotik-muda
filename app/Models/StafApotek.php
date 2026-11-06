<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafApotek extends Model {
    use HasFactory;
    protected $fillable = ['nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'no_hp'];
}