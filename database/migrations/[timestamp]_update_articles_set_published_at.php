use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateArticlesSetPublishedAt extends Migration
{
    public function up()
    {
        // Обновляем все записи, где published_at is null
        DB::table('articles')
            ->whereNull('published_at')
            ->update([
                'published_at' => DB::raw('created_at') // используем дату создания как дату публикации
            ]);
    }

    public function down()
    {
        // Если нужен откат, оставляем пустым, так как восстановить null значения не требуется
    }
} 