<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;

class TestLocking extends Command
{
    protected $signature = 'test:locking';
    protected $description = 'Test Locking for product purchase';

    public function handle()
    {
        DB::transaction(function () {
            $productVariant = ProductVariant::where('id', 1)->lockForUpdate()->first();
            if ($productVariant->quantity >= 1) {
                sleep(2);
                $productVariant->quantity -= 1;
                $productVariant->save();
                $this->info('Đặt hàng thành công');
            } else {
                $this->error('Sản phẩm đã hết hàng.');
            }
        });
    }
}
// Nếu tính test thì set 1 variant về quantity là 1 rồi mở 2 terminal rồi copy php artisan test:locking xong enter cùng 1 lúc nhé, cùng 1 lúc khó nhưng sao cho nhanh nhất có thể là được