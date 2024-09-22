<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_babysitter_feedbacks_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabysitterFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('babysitter_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('reviewer_name');
            $table->text('review_feedback');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('babysitter_feedbacks');
    }
}
