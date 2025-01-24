 <?php 
 use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('assistant')->nullable();
            $table->string('lead_source')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('title')->nullable();
            $table->string('department')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('asst_phone')->nullable();
            $table->string('secondary_email')->nullable();
            $table->unsignedBigInteger('reporting_to')->nullable();
            // Foreign key relation
            $table->foreign('reporting_to')->references('id')->on('contacts')->onDelete('set null');

            // Mailing Address
            $table->string('mailing_street')->nullable();
            $table->string('mailing_city')->nullable();
            $table->string('mailing_state')->nullable();
            $table->string('mailing_pincode')->nullable();
            $table->string('mailing_country')->nullable();

            // Other Address
            $table->string('other_street')->nullable();
            $table->string('other_city')->nullable();
            $table->string('other_state')->nullable();
            $table->string('other_pincode')->nullable();
            $table->string('other_country')->nullable();

            // Description Information
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
