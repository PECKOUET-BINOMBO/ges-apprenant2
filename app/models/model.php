<?php

namespace App\Models;

return [
  'json_to_array' => fn(string $file) => json_decode(file_get_contents($file), true),
  'array_to_json' => fn(string $file, array $data) => file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT)),
  'get_users' => fn() => ($data = json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)) && isset($data['utilisateurs']) ? $data['utilisateurs'] : [],
  'get_promotions' => fn() => json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['promotions'] ?? [],
  'get_promotion_active' => fn() => json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['promotion_active'] ?? null,
  'set_promotion_active' => function (int $id) {
    $path = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($path), true);
    $data['promotion_active'] = $id;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
  },
  'get_referentiels' => fn() => json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['referentiels'] ?? [],

  'get_apprenants' => fn() => json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['apprenants'],

  'store_apprenant' => function ($apprenant) {
    $path = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($path), true);

    $apprenant['id'] = count($data['apprenants']) + 1;
    $apprenant['matricule'] = str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);
    $apprenant['mot_de_passe'] = password_hash($apprenant['mot_de_passe'], PASSWORD_DEFAULT);

    $data['apprenants'][] = $apprenant;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
  },

  'update_user_password' => function (string $email, string $new_password): bool {
    $path = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($path), true);
    $updated = false;

    foreach ($data['utilisateurs'] as &$user) {
      if ($user['email'] === $email) {
        $user['mot_de_passe'] = $new_password;
        $updated = true;
        break;
      }
    }

    if ($updated) {
      return file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT)) !== false;
    }

    return false;
  },

  'find_apprenant_by_id' => function (int $id) {
    $path = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($path), true);

    foreach ($data['apprenants'] as $apprenant) {
        if ($apprenant['id'] === $id) {
            return $apprenant;
        }
    }
    return null;
  },

];
