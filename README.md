## AFTER GIT CLONE
Jangan lupa lakuin ini:
- php artisan migrate
- php artisan db:seed
- npm run build
- cp .env.example .env

Lalu masuk ke .env yang udah dibuat, masukkan database kamu yang udah ada, kalo semisal udah ada isinya:
- php artisan migrate:fresh

Kalo semisal udah tinggal :
- php artisan serve
