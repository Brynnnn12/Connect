# 🚀 Connect - Modern Social Media Platform

> **Connect** adalah platform social media modern yang dibangun dengan **TALL Stack** (Tailwind CSS, Alpine.js, Laravel, Livewire). Aplikasi ini menyediakan fitur-fitur lengkap seperti Instagram dengan design yang responsif, real-time updates, dan performa optimal untuk experience pengguna yang luar biasa.

## 📌 Tentang Connect

**Connect** adalah solusi social media lengkap yang memungkinkan user untuk:

-   📝 Membuat dan berbagi postingan
-   ❤️ Memberikan like pada postingan
-   👥 Follow dan unfollow user
-   👤 Melihat profil user publik
-   💬 Interaksi real-time tanpa page refresh

Dibangun dengan teknologi terkini dan best practices modern development, Connect siap untuk scale dan production use.

---

## 🎯 TALL Stack Architecture

**TALL Stack** adalah kombinasi modern untuk membangun aplikasi web full-stack:

| Komponen             | Fungsi                 | Benefit                                |
| -------------------- | ---------------------- | -------------------------------------- |
| **T** - Tailwind CSS | Styling & UI           | Rapid development, consistent design   |
| **A** - Alpine.js    | Frontend interactivity | Lightweight alternative to Vue/React   |
| **L** - Laravel      | Backend framework      | Powerful, secure, well-tested          |
| **L** - Livewire     | Component framework    | Real-time UI tanpa JavaScript kompleks |

Dengan TALL Stack, Anda bisa membuat aplikasi interaktif full-stack **hanya dengan PHP**, tanpa perlu menguasai JavaScript framework yang kompleks.

### Architecture Overview

```
┌─────────────────────────────────────────────────────┐
│              CLIENT SIDE (Browser)                  │
│  ┌────────────────────────────────────────────────┐ │
│  │ Tailwind CSS + Alpine.js                       │ │
│  │ (Beautiful UI + Client Interactivity)          │ │
│  └────────────────────────────────────────────────┘ │
└──────────────────┬──────────────────────────────────┘
                   │ WebSocket / HTTP
┌──────────────────▼──────────────────────────────────┐
│         SERVER SIDE (Laravel Backend)               │
│  ┌────────────────────────────────────────────────┐ │
│  │ Livewire Components                            │ │
│  │ (Real-time reactive components)                │ │
│  └────────────────────────────────────────────────┘ │
│  ┌────────────────────────────────────────────────┐ │
│  │ Laravel Routes & Controllers                   │ │
│  │ (Request handling & business logic)            │ │
│  └────────────────────────────────────────────────┘ │
│  ┌────────────────────────────────────────────────┐ │
│  │ Eloquent ORM & Models                          │ │
│  │ (Database interaction)                         │ │
│  └────────────────────────────────────────────────┘ │
└──────────────────┬──────────────────────────────────┘
                   │
┌──────────────────▼──────────────────────────────────┐
│              DATABASE (MySQL)                       │
│  Users | Posts | Likes | Followers                 │
└─────────────────────────────────────────────────────┘
```

---

## ✨ Fitur Utama

### 📱 Posting & Dashboard

-   ✅ **Buat Postingan** - Modal interaktif untuk membuat postingan baru
-   ✅ **Edit Postingan** - Sunting postingan yang sudah dibuat
-   ✅ **Hapus Postingan** - Hapus postingan dengan konfirmasi
-   ✅ **Feed Real-time** - Tampilkan postingan dari user yang diikuti
-   ✅ **Validation** - Validasi konten postingan (min 3 karakter, max 2000)

### ❤️ Like System

-   ✅ **Like/Unlike** - Berikan atau hapus like pada postingan
-   ✅ **Like Counter** - Hitung jumlah like secara real-time
-   ✅ **Like Status** - Icon hati berubah warna saat di-like
-   ✅ **Smooth Animation** - Transisi smooth saat like/unlike

### 👥 Follow System

-   ✅ **Follow/Unfollow** - Ikuti atau berhenti mengikuti user
-   ✅ **Follower Count** - Tampilkan jumlah pengikut dan mengikuti
-   ✅ **Suggested Users** - Rekomendasi user untuk diikuti
-   ✅ **Follow Button** - Status button berubah saat di-follow
-   ✅ **Real-time Updates** - Follower count update instant tanpa refresh

### 👤 User Profile

-   ✅ **Public Profile** - Lihat profil user lain (publik)
-   ✅ **Profile Stats** - Tampilkan postingan, pengikut, mengikuti
-   ✅ **User Feed** - Tampilkan semua postingan user
-   ✅ **Edit Profile** - Sunting nama dan email
-   ✅ **Profile Picture** - Avatar gradient dengan inisial

### 🎨 Design & UX

-   ✅ **Instagram-like Design** - Desain modern seperti Instagram
-   ✅ **Responsive Layout** - Bekerja sempurna di desktop & mobile
-   ✅ **Dark Mode** - Support dark mode penuh
-   ✅ **Smooth Transitions** - Animasi smooth di setiap interaksi
-   ✅ **Loading States** - Feedback visual saat loading

---

## 🛠 Tech Stack Detail

### 🎯 TALL Stack Components

#### **T - Tailwind CSS**

```
Utility-first CSS framework untuk styling modern
- Pre-built classes untuk rapid development
- Responsive design built-in (mobile-first)
- Dark mode support penuh
- Customizable theme
```

**Keuntungan:**

-   ✅ Kecepatan development 2-3x lebih cepat
-   ✅ File CSS lebih kecil (tree-shaking)
-   ✅ Konsistensi design sistem
-   ✅ Mudah customize dan extend

#### **A - Alpine.js**

```
Lightweight JavaScript framework untuk interactivity
- Hanya 15KB gzipped
- Direct DOM manipulation
- Perfect untuk progressive enhancement
- Tidak perlu build step untuk sebagian use case
```

**Keuntungan:**

-   ✅ Performa maksimal (lightweight)
-   ✅ Learning curve rendah
-   ✅ Cocok untuk UI sederhana-menengah
-   ✅ Integrasi seamless dengan Laravel

#### **L - Laravel**

```
Full-stack web framework PHP yang powerful
- Elegant syntax dan developer experience
- Built-in authentication & authorization
- Database ORM (Eloquent) yang powerful
- Comprehensive routing & middleware
```

**Keuntungan:**

-   ✅ Security best practices built-in
-   ✅ Dokumentasi lengkap dan community besar
-   ✅ Rapid development tools & commands
-   ✅ Scalable architecture

#### **L - Livewire**

```
Real-time reactive components untuk Laravel
- Build dynamic components hanya dengan PHP
- Real-time UI updates tanpa JavaScript kompleks
- Event-driven architecture
- File per component yang clean
```

**Keuntungan:**

-   ✅ Full-stack development hanya PHP
-   ✅ Real-time features tanpa API kompleks
-   ✅ Developer experience yang superior
-   ✅ Reduced JavaScript complexity

### 📦 Tech Stack Lengkap

| Layer               | Technology   | Version | Purpose                 |
| ------------------- | ------------ | ------- | ----------------------- |
| **Backend**         | Laravel      | 12.36.1 | Web framework           |
| **Backend**         | Livewire     | 3       | Real-time components    |
| **Backend**         | PHP          | 8.3.12  | Programming language    |
| **Frontend**        | Tailwind CSS | 3       | Styling                 |
| **Frontend**        | Alpine.js    | 3       | Interactivity           |
| **Frontend**        | Flux UI      | Latest  | Component library       |
| **Database**        | MySQL        | 8.0+    | Data storage            |
| **Build Tool**      | Vite         | Latest  | Frontend bundling       |
| **Package Manager** | Composer     | Latest  | PHP dependencies        |
| **Package Manager** | npm          | Latest  | JavaScript dependencies |

---

## 🚀 Mengapa TALL Stack?

### Dibanding dengan Tech Stack Lain

| Aspek               | TALL Stack             | Vue/React            | Traditional Laravel |
| ------------------- | ---------------------- | -------------------- | ------------------- |
| Learning Curve      | ⭐⭐⭐ (Rendah)        | ⭐ (Sangat tinggi)   | ⭐⭐ (Sedang)       |
| Developer Speed     | ⭐⭐⭐⭐⭐ (Cepat)     | ⭐⭐⭐⭐ (Cepat)     | ⭐⭐⭐ (Normal)     |
| Performance         | ⭐⭐⭐⭐ (Excellent)   | ⭐⭐⭐⭐ (Excellent) | ⭐⭐⭐ (Good)       |
| Bundle Size         | ⭐⭐⭐⭐⭐ (Kecil)     | ⭐⭐ (Besar)         | ⭐⭐⭐⭐ (Medium)   |
| Real-time Features  | ⭐⭐⭐⭐⭐ (Easy)      | ⭐⭐⭐⭐ (Moderate)  | ⭐⭐ (Hard)         |
| Backend Integration | ⭐⭐⭐⭐⭐ (Native)    | ⭐⭐⭐ (Via API)     | ⭐⭐⭐⭐ (Native)   |
| Team Productivity   | ⭐⭐⭐⭐⭐ (Very High) | ⭐⭐⭐⭐ (High)      | ⭐⭐⭐ (Moderate)   |

### Use Cases Ideal untuk TALL Stack

✅ **Perfect untuk:**

-   Social media platforms
-   Real-time dashboards
-   Admin panels
-   CMS applications
-   Chat applications
-   Collaborative tools
-   Startup MVPs
-   Full-stack monolithic applications

❌ **Kurang ideal untuk:**

-   Highly interactive SPAs (gunakan Vue/React)
-   Mobile apps (gunakan React Native)
-   Static sites (gunakan Astro/Static generators)

---

## 📋 Daftar Isi

-   [Tentang Connect](#tentang-connect)
-   [TALL Stack Architecture](#tall-stack-architecture)
-   [Fitur Utama](#fitur-utama)
-   [Tech Stack Detail](#tech-stack-detail)
-   [Instalasi](#instalasi)
-   [Menjalankan Aplikasi](#menjalankan-aplikasi)
-   [Struktur Folder](#struktur-folder)
-   [Livewire Component Guide](#livewire-component-guide)
-   [Event Handling & Real-time](#event-handling--real-time)
-   [Fitur Detail](#fitur-detail)
-   [Database Schema](#database-schema)
-   [Production Deployment](#production-deployment)
-   [Security Best Practices](#security-best-practices)
-   [TALL Stack Best Practices](#tall-stack-best-practices)
-   [Troubleshooting](#troubleshooting)
-   [Learning Path](#learning-path-untuk-tall-stack)

---

## 📥 Instalasi

### Prerequisites

Pastikan sudah install:

-   PHP 8.3+
-   Composer
-   Node.js & npm
-   MySQL 8.0+
-   Git

### Step 1: Clone Repository

```bash
git clone https://github.com/Brynnnn12/Connect.git
cd Connect
```

### Step 2: Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### Step 3: Setup Environment

```bash
# Copy .env.example ke .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=connect
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru:

```bash
mysql -u root -p
> CREATE DATABASE connect;
> EXIT;
```

### Step 5: Database Migration & Seeding

```bash
# Jalankan migrations dan seeder
php artisan migrate:fresh --seed

# Atau hanya migration (tanpa dummy data)
php artisan migrate
```

**Data yang dibuat oleh seeder:**

-   5 user dummy dengan data faker
-   15 posts (3 per user)
-   Relationships: follows dan likes
-   Test data lengkap untuk development

---

## ▶️ Menjalankan Aplikasi

### Development Server

Terminal 1 - Laravel Development Server:

```bash
php artisan serve
```

Terminal 2 - Vite Development Server (untuk CSS/JS):

```bash
npm run dev
```

Aplikasi akan tersedia di: **http://127.0.0.1:8000**

### Login dengan Dummy Account

Setelah menjalankan `php artisan migrate:fresh --seed`, Anda bisa login dengan:

```
Email: arely.hahn@example.org (atau user lain yang di-seed)
Password: password
```

Atau lihat user yang tersedia:

```bash
php artisan tinker
>>> User::all(['name', 'email'])->toArray();
```

### Build untuk Production

```bash
# Build frontend assets
npm run build

# Deploy siap production
```

---

## 📁 Struktur Folder

```
Connect/
├── app/
│   ├── Http/
│   │   └── Controllers/        # HTTP Controllers
│   ├── Livewire/
│   │   ├── Posts/
│   │   │   ├── PostModal.php   # Modal buat/edit post
│   │   │   └── PostList.php    # List posts component
│   │   └── Actions/
│   ├── Models/
│   │   ├── User.php            # User model + relationships
│   │   ├── Post.php            # Post model
│   │   └── Like.php            # Like model (pivot table)
│   └── Providers/              # Service providers
├── database/
│   ├── migrations/             # Database migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_10_30_155215_create_posts_table.php
│   │   ├── 2025_10_30_155236_create_likes_table.php
│   │   └── 2025_10_30_155244_create_followers_table.php
│   ├── factories/              # Model factories
│   │   ├── UserFactory.php
│   │   └── PostFactory.php
│   └── seeders/
│       └── DatabaseSeeder.php  # Database seeder
├── resources/
│   ├── css/
│   │   └── app.css             # Global styles
│   ├── js/
│   │   └── app.js              # Global scripts
│   └── views/
│       ├── livewire/           # Livewire Volt components
│       │   ├── posts/
│       │   │   ├── post-modal.blade.php      # Create/edit modal
│       │   │   └── post-list.blade.php       # Posts feed
│       │   ├── likes/
│       │   │   └── like-button.blade.php     # Like button
│       │   ├── follows/
│       │   │   └── follow-button.blade.php   # Follow button
│       │   ├── pages/
│       │   │   └── profile.blade.php         # User profile page
│       │   └── settings/
│       │       └── profile.blade.php         # Edit profile
│       ├── components/         # Reusable components
│       │   ├── layouts/
│       │   │   └── app/
│       │   │       ├── sidebar.blade.php     # Sidebar navigation
│       │   │       ├── header.blade.php      # Top header
│       │   │       └── app.blade.php         # Main layout
│       │   └── ...
│       ├── dashboard.blade.php # Main feed
│       ├── profile.blade.php   # Profile view
│       └── welcome.blade.php   # Welcome page
├── routes/
│   ├── web.php                 # Web routes
│   └── console.php             # Console commands
├── tests/
│   ├── Feature/                # Feature tests
│   │   └── DashboardTest.php
│   └── Unit/                   # Unit tests
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
├── config/
│   ├── app.php
│   ├── database.php
│   ├── cache.php
│   └── ...
├── bootstrap/
│   ├── app.php
│   └── providers.php
├── public/                     # Public assets
│   ├── index.php
│   ├── robots.txt
│   └── build/
├── vendor/                     # Composer packages
├── node_modules/               # npm packages
├── package.json
├── composer.json
├── vite.config.js
├── tailwind.config.js
└── README.md
```

---

## 🎯 Livewire Component Guide

### Apa itu Livewire Component?

Livewire adalah framework yang membuat Anda bisa membuat interactive components menggunakan **hanya PHP** - tanpa JavaScript kompleks.

```php
<?php
use Livewire\Volt\Component;

new class extends Component {
    public string $message = '';

    public function submit()
    {
        // Logic di sini dijalankan di server
        // UI update otomatis tanpa JavaScript!
    }
}; ?>

<div>
    <input wire:model="message" />
    <button wire:click="submit">Send</button>
</div>
```

### Component Struktur di Connect

Connect menggunakan **Volt** - syntaks terbaru Livewire yang single-file component:

```
resources/views/livewire/
├── posts/
│   ├── post-modal.blade.php      # Modal create/edit posts
│   └── post-list.blade.php       # List posts component
├── likes/
│   └── like-button.blade.php     # Like button dengan counter
├── follows/
│   └── follow-button.blade.php   # Follow/unfollow button
└── pages/
    └── profile.blade.php         # User profile page
```

### Livewire Directives di Connect

#### `wire:model` - Two-way Data Binding

```blade
<!-- Input automatically sync dengan property PHP -->
<input wire:model="content" placeholder="Tulis postingan...">

<!-- Dengan debounce untuk better performance -->
<input wire:model.debounce.300ms="content">
```

#### `wire:click` - Event Listener

```blade
<!-- Trigger method ketika button diklik -->
<button wire:click="toggleFollow">Ikuti</button>

<!-- Dengan konfirmasi -->
<button wire:click="delete({{ $post->id }})"
        wire:confirm="Hapus postingan ini?">Hapus</button>
```

#### `wire:navigate` - SPA-like Navigation

```blade
<!-- Navigate tanpa full page reload -->
<a wire:navigate href="{{ route('profile', $user) }}">
    {{ $user->name }}
</a>
```

#### `wire:key` - Component Tracking

```blade
<!-- Unique identifier untuk component dalam list -->
<livewire:likes.like-button :post="$post"
                             wire:key="like-button-{{ $post->id }}" />
```

---

## ⚡ Event Handling & Real-time Features

### Bagaimana Real-time Bekerja di Connect

Connect menggunakan **Livewire event dispatching** untuk real-time updates:

```
User A clicks "Follow Button"
          ↓
followButton.blade.php fires toggleFollow()
          ↓
Database relationship updated (attach/detach)
          ↓
$this->dispatch('followStatusChanged')
          ↓
profile.blade.php listener catches event
          ↓
#[On('followStatusChanged')] refreshFollowerCount()
          ↓
Profile re-renders with new follower count
          ↓
Browser sees updated count instantly ✨
```

### Event Listener Pattern

#### Follow Button (Dispatcher)

```php
// resources/views/livewire/follows/follow-button.blade.php
public function toggleFollow(): void
{
    auth()->user()->following()->toggle($this->user->id);
    $this->isFollowing = !$this->isFollowing;

    // Dispatch event untuk profile component
    $this->dispatch('followStatusChanged');
}
```

#### Profile Page (Listener)

```php
// resources/views/livewire/pages/profile.blade.php
#[On('followStatusChanged')]
public function refreshFollowerCount(): void
{
    // Reload semua data dari database
    $this->user->refresh();
    $this->loadUserData();
}
```

### Real-time Features di Connect

| Feature         | Mechanism                     | Benefit           |
| --------------- | ----------------------------- | ----------------- |
| Like/Unlike     | `wire:click` + counter update | Instant feedback  |
| Follow/Unfollow | Event dispatch + listener     | Real-time count   |
| Create Post     | Modal + PostList refresh      | Immediate display |
| Edit Post       | Action menu + reload          | Live update       |
| Delete Post     | Confirmation + remove         | Instant removal   |

### Data Flow Architecture

```
┌─────────────────────────────────────────┐
│   USER INTERACTION (Browser)            │
│   - Click button                        │
│   - Type in input                       │
│   - Submit form                         │
└──────────────┬──────────────────────────┘
               │
               ↓
┌─────────────────────────────────────────┐
│   LIVEWIRE JS (Client-side)             │
│   - Intercepts event                    │
│   - Sends to server                     │
│   - Receives HTML delta                 │
│   - Updates DOM                         │
└──────────────┬──────────────────────────┘
               │
               ↓
┌─────────────────────────────────────────┐
│   LIVEWIRE COMPONENT (Server-side)      │
│   - Process event                       │
│   - Update PHP properties               │
│   - Execute methods                     │
│   - Dispatch events if needed           │
└──────────────┬──────────────────────────┘
               │
               ↓
┌─────────────────────────────────────────┐
│   ELOQUENT ORM (Database)               │
│   - Query execution                     │
│   - Data persistence                    │
│   - Relationships loaded                │
└──────────────┬──────────────────────────┘
               │
               ↓
┌─────────────────────────────────────────┐
│   COMPONENT RE-RENDER                   │
│   - Fresh HTML generated                │
│   - Computed properties updated         │
│   - Event listeners registered          │
│   - Response sent to browser            │
└──────────────┬──────────────────────────┘
               │
               ↓
┌─────────────────────────────────────────┐
│   DOM UPDATE (Browser)                  │
│   - Smart delta-diffing                 │
│   - Only changed elements updated       │
│   - Smooth transitions                  │
│   - User sees instant updates           │
└─────────────────────────────────────────┘
```

---

## 🎯 Fitur Detail

### 1. Posting System

#### Membuat Postingan

1. Klik tombol **"➕ Buat"** di sidebar
2. Modal akan membuka dengan form
3. Ketik konten postingan (minimal 3 karakter)
4. Klik **"Posting"** untuk submit
5. Postingan akan muncul di feed

**Validasi:**

-   Minimal 3 karakter
-   Maksimal 2000 karakter
-   Required field

#### Mengedit Postingan

1. Hover ke postingan milik Anda
2. Klik ikon `...` (menu)
3. Pilih **"Edit"**
4. Modal akan terbuka dengan konten lama
5. Edit konten dan klik **"Update"**

#### Menghapus Postingan

1. Hover ke postingan milik Anda
2. Klik ikon `...` (menu)
3. Pilih **"Hapus"**
4. Konfirmasi penghapusan
5. Postingan akan dihapus

### 2. Like System

#### Cara Memberikan Like

1. Lihat postingan di feed atau profil user
2. Klik icon ❤️ (hati) di bagian bawah post
3. Icon akan berubah merah dan jumlah like bertambah
4. Data update real-time tanpa refresh

#### Fitur Like

-   **Real-time Update** - Jumlah like update langsung
-   **Status Indicator** - Icon berubah warna saat di-like
-   **Counter** - Tampilkan jumlah total like
-   **Responsive** - Bekerja di semua device

### 3. Follow System

#### Cara Follow User

1. Buka halaman profil user
2. Klik tombol **"Ikuti"** (jika belum follow)
3. Button akan berubah menjadi **"Mengikuti"**
4. Postingan user akan muncul di feed Anda

#### Suggested Users

1. Di dashboard, lihat section **"Orang yang Mungkin Anda Kenal"**
2. Lihat rekomendasi user untuk diikuti
3. Klik **"Ikuti"** untuk follow
4. Atau klik nama user untuk lihat profilnya lebih dulu

#### Unfollow

1. Buka profil user yang sudah di-follow
2. Klik tombol **"Mengikuti"**
3. Akan berubah menjadi **"Ikuti"** lagi

### 4. User Profile

#### Public Profile

1. Klik nama user di postingan atau card user
2. URL: `/profile/{user-id}`
3. Lihat profil lengkap user tersebut

#### Profile Information

-   **Avatar** - Inisial dengan gradient
-   **Nama & Username** - Nama lengkap dan username
-   **Stats** - Jumlah postingan, pengikut, mengikuti
-   **Postingan** - Semua postingan user

#### Edit Profile

1. Di dashboard, klik menu profil (avatar di sidebar)
2. Pilih **"Profil Saya"**
3. Update nama dan email
4. Klik **"Simpan Perubahan"**

---

## 🗄️ Database Schema

### Users Table

```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255),
    two_factor_secret TEXT NULL,
    two_factor_recovery_codes TEXT NULL,
    two_factor_confirmed_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Posts Table

```sql
CREATE TABLE posts (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    content LONGTEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Likes Table

```sql
CREATE TABLE likes (
    user_id BIGINT NOT NULL,
    post_id BIGINT NOT NULL,
    created_at TIMESTAMP,
    PRIMARY KEY (user_id, post_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);
```

### Followers Table

```sql
CREATE TABLE followers (
    follower_user_id BIGINT NOT NULL,
    following_user_id BIGINT NOT NULL,
    created_at TIMESTAMP,
    PRIMARY KEY (follower_user_id, following_user_id),
    FOREIGN KEY (follower_user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (following_user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Model Relationships

```
User
├── has many Posts
├── has many Likes (through posts liked)
├── has many Following (users yang diikuti)
└── has many Followers (user yang follow)

Post
├── belongs to User
└── has many Likes (from users)
```

---

## 🚀 Production Deployment

### Pre-deployment Checklist

```bash
# 1. Environment setup
cp .env.production .env
php artisan key:generate

# 2. Install dependencies
composer install --optimize-autoloader --no-dev
npm install --production
npm run build

# 3. Database
php artisan migrate --force
php artisan db:seed --force

# 4. Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Storage
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Hosting Recommendations

**For TALL Stack Applications:**

| Provider                      | Support    | Cost          | Rating     |
| ----------------------------- | ---------- | ------------- | ---------- |
| **Laravel Forge**             | ⭐⭐⭐⭐⭐ | $12.99/mo     | 🏆 Best    |
| **DigitalOcean App Platform** | ⭐⭐⭐⭐   | $5-12/mo      | 😊 Great   |
| **Render**                    | ⭐⭐⭐⭐   | $7-25/mo      | 😊 Great   |
| **Railway**                   | ⭐⭐⭐⭐   | Pay as you go | 😊 Great   |
| **AWS Lightsail**             | ⭐⭐⭐     | $3.50-40/mo   | 💻 Complex |
| **Shared Hosting**            | ⭐⭐       | $2-5/mo       | ⚠️ Limited |

### Deploy dengan Laravel Forge

```bash
# 1. Create server di Laravel Forge
# 2. Connect repository
# 3. Forge handles:
#    - SSL certificate (Let's Encrypt)
#    - Deployment automation
#    - Database backups
#    - Monitoring
#    - Security updates
```

### Environment Variables untuk Production

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://connect.example.com

DB_CONNECTION=mysql
DB_HOST=database.example.com
DB_DATABASE=connect_prod
DB_USERNAME=db_user
DB_PASSWORD=secure_password

MAIL_FROM_ADDRESS=noreply@connect.example.com
MAIL_FROM_NAME="Connect"

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

---

## 🔒 Security Best Practices

### Authentication & Authorization

```php
// ✅ Protect routes dengan middleware
Route::get('/profile/edit', ...)
    ->middleware('auth')
    ->name('profile.edit');

// ✅ Authorize actions
public function edit(Post $post)
{
    $this->authorize('update', $post);
}
```

### CSRF Protection

```blade
<!-- ✅ Livewire auto-includes CSRF token -->
<form>
    <!-- Token included automatically -->
</form>
```

### SQL Injection Prevention

```php
// ✅ BAIK - Eloquent dengan parameterized queries
$user = User::where('email', $email)->first();

// ❌ BURUK - Raw SQL vulnerable to injection
$user = DB::select("SELECT * FROM users WHERE email = '{$email}'");
```

### XSS Prevention

```blade
<!-- ✅ BAIK - Blade auto-escapes -->
<h1>{{ $user->name }}</h1>

<!-- ❌ BURUK - Unescaped output -->
<h1>{!! $user->name !!}</h1>
```

---

## 💡 TALL Stack Best Practices

### 1. Component Organization

✅ **DO:**

```php
// One component = one responsibility
// resources/views/livewire/likes/like-button.blade.php
<?php
new class extends Component {
    public Post $post;

    public function toggleLike() { /* ... */ }
}; ?>
```

❌ **DON'T:**

```php
// Jangan mix banyak logic dalam satu component
<?php
new class extends Component {
    public function handleLike() { }
    public function handleFollow() { }
    public function handleComment() { }
    // Terlalu banyak logic!
}; ?>
```

### 2. Performance Optimization

**Use Eager Loading:**

```php
// ✅ BAIK - Load relationships
$posts = $user->posts()->with('user', 'likes')->latest()->get();

// ❌ BURUK - N+1 query problem
$posts = $user->posts()->latest()->get();
// Setiap loop: query user, query likes, etc.
```

**Use Computed Properties:**

```php
// ✅ BAIK - Cached computed value
#[Livewire\Attributes\Computed]
public function isFollowing()
{
    return auth()->user()->following()->where(...)->exists();
}

// ❌ BURUK - Computed setiap kali diakses
public function getIsFollowing()
{
    return auth()->user()->following()->where(...)->exists();
}
```

**Use wire:key pada Lists:**

```blade
<!-- ✅ BAIK - Proper component tracking -->
@foreach ($posts as $post)
    <livewire:like-button :post="$post"
                          wire:key="like-{{ $post->id }}" />
@endforeach

<!-- ❌ BURUK - Component tidak ter-track dengan baik -->
@foreach ($posts as $post)
    <livewire:like-button :post="$post" />
@endforeach
```

### 3. Styling Best Practices

**Use Utility Classes:**

```blade
<!-- ✅ BAIK - Tailwind utilities -->
<button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
    Click me
</button>

<!-- ❌ BURUK - Custom CSS -->
<style>
.my-button {
    padding: 8px 16px;
    background: blue;
    color: white;
}
</style>
```

**Use Responsive Design:**

```blade
<!-- ✅ BAIK - Mobile-first responsive -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
    <!-- Layout changes per screen size -->
</div>

<!-- ❌ BURUK - Hardcoded for desktop -->
<div class="grid grid-cols-3">
    <!-- Broken on mobile! -->
</div>
```

### 4. Event Handling

**Use Descriptive Event Names:**

```php
// ✅ BAIK - Clear intent
$this->dispatch('followStatusChanged');
$this->dispatch('postCreated');

// ❌ BURUK - Ambiguous
$this->dispatch('update');
$this->dispatch('refresh');
```

**Use Event Listeners:**

```php
// ✅ BAIK - Modern Livewire 3 syntax
#[On('followStatusChanged')]
public function refreshData() { }

// ❌ BURUK - Old syntax (still works but not recommended)
protected $listeners = ['followStatusChanged' => 'refreshData'];
```

### 5. Validation

```php
// ✅ BAIK - Proper validation
public function save()
{
    $validated = $this->validate([
        'content' => 'required|min:3|max:2000',
    ]);

    Post::create($validated);
}

// ❌ BURUK - No validation
public function save()
{
    Post::create(['content' => $this->content]);
}
```

---

## 🎓 Learning Path untuk TALL Stack

### Beginner (Week 1-2)

1. Belajar Tailwind CSS basics
    - Utilities, classes, responsive design
    - Dark mode, hover states
2. Belajar Laravel basics
    - Routing, controllers, models
    - Database migrations
3. Belajar Livewire basics
    - Component structure
    - wire:model, wire:click
    - Re-rendering

### Intermediate (Week 3-4)

1. Computed properties & caching
2. Event dispatching & listeners
3. Component nesting
4. Form validation dengan Livewire
5. Eager loading & performance

### Advanced (Week 5+)

1. Real-time features
2. WebSocket integration
3. Testing Livewire components
4. Optimization & scaling
5. Deploy to production

---

## 📚 Useful Resources

### Documentation

-   [Laravel Docs](https://laravel.com/docs) - Official Laravel documentation
-   [Livewire Docs](https://livewire.laravel.com/docs) - Official Livewire documentation
-   [Tailwind Docs](https://tailwindcss.com/docs) - Official Tailwind CSS documentation
-   [Alpine.js Docs](https://alpinejs.dev/start-here) - Official Alpine.js documentation

### Tools & UI

-   [Tailwind UI](https://tailwindui.com/) - Pre-built components
-   [Livewire Volt](https://livewire.laravel.com/docs/volt) - Single-file components
-   [Laravel Breeze](https://laravel.com/docs/starter-kits) - Starter kit
-   [Flux](https://fluxui.dev/) - Component library for TALL Stack

### Learning Platforms

-   [Laracasts](https://laracasts.com/) - Video tutorials (paid)
-   [Laravel Daily](https://laraveldaily.com/) - Daily tips and tutorials
-   [Povilas Korop YouTube](https://www.youtube.com/@Povilas_K) - Free Laravel tutorials

### Community

-   [Laravel Discord](https://discord.gg/laravel) - Official Discord community
-   [Livewire GitHub Discussions](https://github.com/livewireui/livewire/discussions) - GitHub discussions
-   [Reddit r/laravel](https://www.reddit.com/r/laravel/) - Reddit community
-   [Laravel Forums](https://laracasts.com/discuss) - Official forums

---

## 🐛 Troubleshooting

### Problem: Postingan tidak muncul

**Solution:**

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Restart server
php artisan serve
```

### Problem: Styling tidak terlihat

**Solution:**

```bash
# Build Tailwind CSS
npm run dev

# Atau build untuk production
npm run build
```

### Problem: Database connection error

**Solution:**

```bash
# Check MySQL running
mysql -u root -p

# Test connection dari Laravel
php artisan tinker
>>> DB::connection()->getPDO();

# Jika masih error, reset database
php artisan migrate:fresh --seed
```

### Problem: Permission denied di storage

**Solution:**

```bash
# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Problem: Livewire component tidak load

**Solution:**

```bash
# Publish Livewire assets
php artisan livewire:publish

# Clear cache
php artisan cache:clear
php artisan config:clear
```

### Problem: Like button atau Follow button hilang setelah aksi

**Solution:**

Pastikan:

1. `wire:key` ditambahkan pada component dalam loop
2. `loadUserData()` dipanggil di listener untuk reload posts
3. Cache sudah di-clear
4. Browser cache sudah di-clear (Ctrl+Shift+Delete)

### Problem: Real-time update tidak bekerja

**Solution:**

```bash
# Verifikasi event listener
php artisan tinker
>>> event(new \App\Events\FollowStatusChanged());

# Check Livewire is installed
php artisan livewire:publish

# Restart dev server
php artisan serve
```

---

## 📊 Dummy Data

Database sudah diisi dengan dummy data siap pakai:

-   **5 User** - Dengan nama dan email faker
-   **15 Posts** - 3 post per user dengan konten menarik
-   **Follows** - Setiap user follow 2-3 user lain
-   **Likes** - Posts mendapat like dari user random

Untuk melihat user yang tersedia:

```bash
php artisan tinker
>>> User::all(['name', 'email'])->toArray();
```

---

## 🚀 Performance Tips

1. **Database Queries** - Gunakan eager loading dengan `with()`
2. **Caching** - Cache data yang jarang berubah
3. **Pagination** - Gunakan pagination untuk feed besar
4. **Compression** - Enable gzip compression di server
5. **CDN** - Gunakan CDN untuk static assets
6. **Database Indexing** - Index frequently queried columns
7. **Livewire Caching** - Use Livewire computed properties

---

## 📝 Development Guidelines

### Code Style

-   PSR-12 untuk PHP
-   ESLint untuk JavaScript
-   Tailwind best practices untuk CSS

### Git Workflow

```bash
# Create feature branch
git checkout -b feature/nama-fitur

# Commit changes
git add .
git commit -m "Add: deskripsi fitur"

# Push to remote
git push origin feature/nama-fitur

# Create pull request
```

### Testing

```bash
# Run tests
php artisan test

# Run specific test
php artisan test tests/Feature/PostTest.php

# With coverage
php artisan test --coverage
```

---

## 📞 Support & Contact

Untuk pertanyaan atau bug report, silakan buat issue di GitHub repository.

---

## 📄 License

Proyek ini menggunakan MIT License. Silakan lihat file `LICENSE` untuk detail lebih lanjut.

---

## 👨‍💻 Author

**Bryan Ka**

-   GitHub: [@Brynnnn12](https://github.com/Brynnnn12)
-   Email: admin@gmail.com

---

## 🙏 Acknowledgments

-   Laravel community & team
-   Livewire team at Livewire
-   Tailwind CSS team
-   Alpine.js community
-   All contributors

---

## 🎉 Happy Coding!

Terima kasih sudah menggunakan **Connect**. Semoga aplikasi ini membantu Anda memahami TALL Stack dan membuat social media platform yang awesome!

Jangan lupa untuk:

-   ⭐ Star repository ini
-   🍴 Fork untuk project sendiri
-   💬 Beri feedback dan suggestions
-   🤝 Berkontribusi dengan pull requests

Happy building! 🚀
