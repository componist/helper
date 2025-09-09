```
$envPath = base_path('.env');
if (!File::exists($envPath)) {
return response()->json(['error' => '.env not found'], 404);
}

$lines = File::lines($envPath)->filter()->toArray();

$env = [];
foreach ($lines as $line) {
if (str_starts_with(trim($line), '#') || !str_contains($line, '=')) {
continue;
}

[$key, $value] = explode('=', $line, 2);
$env[trim($key)] = trim($value);
}

dd($env);


```
