# 🏟️ Sports Booking & Sales Platform

Sistema web fullstack para la gestión de reservas de canchas deportivas y venta de productos, enfocado en brindar una experiencia interactiva y dinámica al usuario mediante el uso intensivo de JavaScript.

---

## 🎯 Descripción

Aplicación web que permite administrar un negocio deportivo integrando:

* Reserva de canchas en tiempo real
* Gestión de productos y ventas
* Interacción dinámica del usuario

El sistema está diseñado para optimizar la experiencia del usuario final mediante interfaces responsivas y comportamiento dinámico en el frontend.

---

## 🚀 Funcionalidades principales

### 🗓️ Gestión de reservas

* Selección de canchas por fecha y horario
* Validación dinámica de disponibilidad
* Flujo interactivo de reserva

### 🛒 Venta de productos

* Catálogo de productos
* Registro de ventas asociadas a reservas
* Flujo de compra integrado

### ⚡ Interacción dinámica (JavaScript)

* Actualización de datos sin recarga completa
* Manejo de eventos en tiempo real
* Validaciones en frontend
* Mejora de experiencia de usuario (UX)

---

## 💡 Valor del proyecto

* Integra servicios (reservas) + ventas en una sola plataforma
* Mejora la experiencia del usuario mediante frontend dinámico
* Simula un sistema real de negocio deportivo

---

## 🧠 Arquitectura

* Backend: Laravel 5.5 (PHP)
* Frontend: JavaScript (manejo de eventos, DOM, interactividad)
* Base de datos: MySQL
* Patrón: MVC

---

## 🔄 Flujo del sistema

1. Usuario selecciona una cancha
2. El sistema valida disponibilidad dinámicamente (JS)
3. Se registra la reserva
4. Usuario puede añadir productos
5. Se genera la operación completa (reserva + venta)

---

## ⚙️ Tecnologías utilizadas

### Backend

* PHP (Laravel)
* MySQL

### Frontend

* JavaScript (DOM, eventos, lógica de interacción)
* HTML / CSS

---

## 🧪 Entorno de ejecución

* XAMPP (PHP 7.2 recomendado)
* Apache
* MySQL

---

## 🛠️ Instalación

```bash
git clone https://github.com/jcyontonel/sports-booking-and-sales-system.git
cd sports-booking-and-sales-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
---

## 👨‍💻 Autor

Jhonattan Yontonel Sotelo
