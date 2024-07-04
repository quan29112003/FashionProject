<?php
namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'expiry_date',
        'min_purchase_amount',
        'category_id',
        'max_usage',
        'used_count',
        'applicable_products',
        'created_count',
        'remaining_count',
        'distribution_channels',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
