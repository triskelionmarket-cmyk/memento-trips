<?php
/**
 * Import SQL dump using Laravel's DB connection.
 * Strips SET @@ and DEFINER statements that require SUPER privilege.
 * Usage: php import_dump.php
 */
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$file = __DIR__ . '/reaktive_travel.sql';
if (!file_exists($file)) {
    echo "❌ reaktive_travel.sql not found\n";
    exit(1);
}

echo "📦 Reading SQL dump...\n";
$sql = file_get_contents($file);

echo "🧹 Cleaning problematic statements...\n";
$sql = preg_replace('/^SET @@.*$/m', '', $sql);
$sql = preg_replace('/DEFINER\s*=\s*`[^`]*`@`[^`]*`/', '', $sql);

echo "🚀 Importing into database...\n";
try {
    DB::connection()->getPdo()->exec($sql);
    echo "✅ SQL dump imported successfully!\n";
} catch (\Exception $e) {
    echo "❌ Import failed: " . $e->getMessage() . "\n";
    exit(1);
}
