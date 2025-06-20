# MVD‑RB‑PORTAL

**Информационный портал Министерства внутренних дел Республики Башкортостан**

---

## 📌 Оглавление

- [Описание](#описание)
- [Технологии](#технологии)
- [Установка](#установка)
- [Запуск](#запуск)
- [Миграции и начальные данные](#миграции-и-начальные-данные)
- [Docker](#docker)
- [Сведения о базе данных](#сведения-о-базе-данных)
- [Тестирование](#тестирование)
- [Доступные команды](#доступные-команды)

---

## 🧾 Описание

Портал предназначен для предоставления информационных сервисов МВД Башкортостана. Реализован как веб-приложение на Laravel с подключением к нескольким базам данных. Поддерживает PostgreSQL, Redis и Oracle DB.

---

## 🛠 Технологии

- **Laravel** 12.2
- **PostgreSQL** 16.2
- **Redis** (для кеширования)
- **Oracle DB** (используется на production)
- **Docker / Docker Compose**
- **Node.js** + npm & Vite (для frontend-ассетов)

---

## 🚀 Установка

1. Клонируйте репозиторий:

   ```bash
   git clone https://github.com/AN-BlackRiver/MVD-RB-PORTAL.git
   cd MVD-RB-PORTAL
   ```

2. Скопируйте файл конфигурации:

   ```bash
   cp .env.example .env
   ```

3. Отредактируйте `.env` под свою конфигурацию (базы данных, Redis, ключи и пр.).

4. Соберите Docker-контейнеры:

   ```bash
   docker compose up -d --build
   ```

---

## 🏁 Запуск

1. Зайдите в контейнер PHP:

   ```bash
   docker exec -ti mvdrb-portal-php-fpm bash
   ```

2. Выполните команды внутри контейнера:

   ```bash
   composer install
   php artisan storage:link
   php artisan migrate --seed
   ```

3. Для фронтенда:

   ```bash
   npm install
   npm run build
   ```

---

## 📦 Миграции и начальные данные

Для создания таблиц и загрузки тестовых данных:

```bash
php artisan migrate
php artisan db:seed
```

Для сброса и повторной инициализации:

```bash
php artisan migrate:fresh --seed
```

---

## 🐳 Docker

Проект запускается в контейнерах:

- PHP-FPM + Laravel
- PostgreSQL
- Redis
- (опционально) Oracle DB — доступна на production-сервере

---

## 🛢 Сведения о базе данных

- Основная БД: **PostgreSQL**
- Production: используется подключение к **Oracle DB**
- Используются сидеры для начальных данных
- В Laravel подключены обе базы через `config/database.php`

---

## 🧪 Тестирование

Для запуска unit и feature тестов:

```bash
docker exec -ti mvdrb-portal-php-fpm php artisan test
```

---

## 📋 Доступные команды

| Команда                                               | Назначение                          |
|--------------------------------------------------------|-------------------------------------|
| `composer install`                                    | Установить зависимости PHP          |
| `npm install` / `npm run build`                       | Установить и собрать фронтенд       |
| `php artisan migrate`                                 | Выполнить миграции                  |
| `php artisan db:seed`                                 | Заполнить БД начальными данными     |
| `php artisan migrate:fresh --seed`                    | Полный сброс и загрузка данных      |
| `php artisan storage:link`                            | Символическая ссылка на storage     |
| `php artisan test`                                    | Запустить тесты                     |

