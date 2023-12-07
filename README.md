## AFTER GIT CLONE
Jangan lupa lakuin ini:
- composer install
- npm install
- cp .env.example .env
- Ubah database dalam .env yang telah dibuat kedalam database yang kalian buat
- php artisan migrate
- php artisan db:seed
- npm run build

- php artisan migrate:fresh (Jika DI MIGRATE ERROR)

Kalo semisal udah tinggal :
- php artisan serve
