public function up(): void
{
    Schema::create('students', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('role')->default('student'); // Ito ang kailangan ng Controller mo
        $table->timestamps();
    });
}