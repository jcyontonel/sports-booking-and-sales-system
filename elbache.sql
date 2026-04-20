-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 17:13:46
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elbache`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_lista` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ancho` decimal(8,2) NOT NULL,
  `largo` decimal(8,2) NOT NULL,
  `costo` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cancha`
--

INSERT INTO `cancha` (`id`, `nombre`, `descripcion`, `img_portada`, `img_lista`, `ubicacion`, `ancho`, `largo`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'Cancha 1', NULL, 'images/cancha-portada/1.jpg', 'images/cancha-lista/1.jpg', 'Enrique Palacios #238', '15.00', '30.00', '35.00', NULL, NULL),
(2, 'Cancha 2', NULL, 'images/cancha-portada/2.jpg', 'images/cancha-lista/2.jpg', 'Enrique Palacios #238', '10.00', '23.00', '20.00', NULL, NULL),
(3, 'Cancha 3', NULL, 'images/cancha-portada/3.jpg', 'images/cancha-lista/3.jpg', 'Enrique Palacios #238', '18.00', '30.00', '40.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha_reserva`
--

CREATE TABLE `cancha_reserva` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `tiempo` time NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcancha` int(10) UNSIGNED NOT NULL,
  `idreserva` int(10) UNSIGNED NOT NULL,
  `costo` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) UNSIGNED NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_23_120644_create_cancha_table', 1),
(4, '2018_04_23_120733_create_producto_table', 1),
(5, '2018_04_23_120822_create_cliente_table', 1),
(6, '2018_04_23_120848_create_reserva_table', 1),
(7, '2018_04_23_120909_create_venta_table', 1),
(8, '2018_04_23_120932_create_pago_table', 1),
(9, '2018_04_23_120953_create_tipo_pago_table', 1),
(10, '2018_04_23_121022_create_producto_venta_table', 1),
(11, '2018_04_23_121052_create_cancha_reserva_table', 1),
(12, '2018_04_23_121127_create_venta_pago_table', 1),
(13, '2018_04_23_121206_create_reserva_pago_table', 1),
(14, '2018_04_23_121249_create_empleado_table', 1),
(15, '2018_04_30_170101_create_tipo_producto_table', 1),
(16, '2018_04_30_170558_foreignd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `idempleado` int(10) UNSIGNED NOT NULL,
  `idtipopago` int(10) UNSIGNED NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `idtipoproducto` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `foto`, `stock`, `precio`, `idtipoproducto`, `created_at`, `updated_at`) VALUES
(1, 'Alquiler 10 camisetas', 'Sunt aliquid tempora soluta amet. Aliquam eligendi aut in sit aut tempore. Est modi atque ipsum exercitationem. Sequi nihil fuga tempore et libero quidem ipsum voluptas. Sed consequuntur rerum doloremque earum odit. Maxime occaecati itaque et adipisci. Qui dolore illo aut harum. Culpa voluptas incidunt a.', 'images/products/9.jpeg', 20, '0.00', 2, NULL, NULL),
(2, '10 agua mineral', 'Vel repellendus optio ut omnis eius ad. Ut autem nisi ad sint autem. Odio aut rerum totam magnam beatae odit repellat.', 'images/products/9.jpeg', 30, '12.00', 1, NULL, NULL),
(3, 'consequuntur', 'Accusamus sit voluptates autem a tenetur tempora eos facere. Debitis cupiditate vitae provident nisi nisi debitis aspernatur officiis. Esse voluptas excepturi aut est esse. Ut facilis distinctio doloremque esse eos sapiente.', 'images/products/14.jpeg', 41, '56.92', 2, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(4, 'sed', 'Minima iste sit fugiat rerum iure quia. Corporis exercitationem harum aut voluptatem. Libero in deleniti qui suscipit inventore perspiciatis. Voluptatum quis similique unde accusamus atque. Nulla iusto quo rerum nisi. Voluptatem amet consequatur dicta delectus et. Maxime ut iste quia sapiente est. Nostrum saepe vitae nisi quos et.', 'images/products/15.jpeg', 74, '66.23', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(5, 'architecto', 'Mollitia impedit quam quasi illum ut quidem. Qui distinctio animi modi repellat recusandae ut aliquam. Earum quia assumenda necessitatibus doloremque et. Et eum eaque dolorum ut cupiditate.', 'images/products/1.jpeg', 29, '50.64', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(6, 'nostrum', 'Et dolorem voluptas eos rerum. Minima doloremque quia labore quia eaque. Ut veniam maxime quibusdam quis quos officiis aut dolor. Et dolores enim sed nisi omnis autem repellendus aut. Ut rerum nulla assumenda numquam. Sint sit ut facilis perferendis velit omnis.', 'images/products/8.jpeg', 58, '65.22', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(7, 'quas', 'Sit doloribus magnam impedit labore. Est molestiae quisquam ex maxime aspernatur. Unde quia molestias et voluptate quos officiis. Minus tempora dignissimos sunt. Illo reprehenderit placeat iure autem qui labore hic. Sed aperiam earum unde laborum ut. Velit ducimus dolorum rerum est.', 'images/products/4.jpeg', 58, '35.64', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(8, 'veniam', 'Enim sequi rerum autem officiis ut saepe ducimus. Alias laboriosam ullam laborum velit sit voluptate laboriosam nihil. Consequuntur deserunt soluta repellat quo. Rerum iusto qui harum distinctio.', 'images/products/1.jpeg', 35, '64.84', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(9, 'rerum', 'Natus quia inventore similique non. Id culpa voluptatem aut architecto qui. Modi ipsam laborum modi blanditiis. Eius autem id incidunt ex. Voluptatem autem saepe odit consectetur iste. Saepe quia exercitationem et fuga occaecati.', 'images/products/7.jpeg', 23, '41.35', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(10, 'ea', 'Qui sit repellendus soluta. Qui dolores voluptatem et voluptas quam. Quisquam doloremque vel eos totam. Aut optio mollitia reiciendis. Eaque quo quia suscipit cumque necessitatibus. Quis minus impedit rerum reprehenderit odit culpa ea. Veniam quis quod animi perferendis enim ut id. Molestiae delectus expedita sed nobis. Cumque est quasi laborum.', 'images/products/16.jpg', 64, '77.33', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(11, 'amet', 'At iure odio voluptatum delectus. Odio ducimus autem doloremque molestiae voluptas id. Et omnis recusandae quia. Quibusdam quo earum voluptatum incidunt voluptatem sunt. Natus eveniet voluptatem consequatur. Repellat autem qui dicta voluptatum autem animi. Eos voluptatem delectus voluptates harum et excepturi sapiente.', 'images/products/19.jpg', 84, '20.66', 1, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(12, 'id', 'Saepe impedit qui pariatur ad ratione. Ullam ut ea similique corporis eum aspernatur et.', 'images/products/8.jpeg', 23, '96.72', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(13, 'illum', 'Nihil sequi dolorem dolore. Debitis hic quidem unde expedita eligendi. Non aut id dolorem architecto tenetur. Nostrum asperiores rerum perferendis aliquam dicta qui.', 'images/products/2.jpeg', 56, '6.32', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(14, 'eaque', 'Officia pariatur commodi porro. Libero qui nostrum adipisci corrupti sint facere fuga nobis. Sed expedita reprehenderit temporibus totam quisquam occaecati. Qui iure quae ut ut ipsa consectetur molestiae.', 'images/products/19.jpg', 82, '46.84', 1, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(15, 'necessitatibus', 'Qui adipisci vero voluptas minima. Quia nulla et aut repudiandae et repellendus. Corporis est voluptatem quis non. Fuga commodi et hic cum molestiae odit voluptate sit. Earum architecto dolorum culpa et eligendi dolore. Soluta ullam omnis recusandae iste est velit.', 'images/products/14.jpeg', 28, '36.21', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(16, 'enim', 'Corporis sint odit ducimus illo. Aliquid perferendis labore quo consequuntur expedita. Corrupti excepturi exercitationem quo omnis dolorem et fugiat. Nihil reiciendis dolorem corporis molestiae itaque incidunt ut. Doloremque hic ut nisi. Et autem quos et ipsam. Facere laboriosam quidem non ipsa.', 'images/products/1.jpeg', 81, '45.91', 5, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(17, 'dolorum', 'Qui dolorum aut error molestias. Aperiam autem illo rerum animi dolorem. Est impedit quidem aut maiores. Ex autem non tenetur dolor. Distinctio iure in distinctio et libero. Sunt voluptatem sunt enim harum.', 'images/products/8.jpeg', 11, '73.49', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(18, 'expedita', 'Iste explicabo eligendi aut et aperiam reprehenderit. Tenetur assumenda enim a facilis consequatur ea quis. Quaerat quae excepturi explicabo qui officiis vel aut. Laudantium porro praesentium voluptas aut eum sed sint molestias. Distinctio veritatis quod doloribus quasi nihil enim quibusdam voluptas.', 'images/products/19.jpg', 42, '18.73', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(19, 'et', 'Optio culpa maiores voluptatem veritatis ex voluptatem cumque et. Error est laudantium dolore sunt similique et a numquam. Et eum adipisci quaerat aliquid iure sequi placeat. Vel voluptate voluptas dolorem rem eum beatae nisi.', 'images/products/10.jpeg', 36, '92.50', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(20, 'quia', 'Earum consequatur officiis esse officia veritatis omnis nemo. Dolor ullam et sint natus error repellendus. Maiores aliquam sint voluptas voluptatem. Qui possimus eum voluptatem laboriosam.', 'images/products/3.jpeg', 33, '57.02', 1, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(21, 'pariatur', 'Dolor quas libero et aut quasi. Corrupti aut molestiae adipisci rem modi debitis sed. Facere possimus id quod quia quas quisquam. Similique itaque possimus reiciendis qui assumenda. Temporibus aut et error consectetur quos nihil sed libero. Similique magnam eum et voluptas ullam. Sint laboriosam est reiciendis sunt.', 'images/products/5.jpeg', 51, '35.29', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(22, 'molestiae', 'Vitae voluptas molestias corporis distinctio. Voluptate voluptate dolor aut quo reiciendis nostrum dolores. Fugit qui non inventore est rerum. Qui omnis quam consectetur ducimus.', 'images/products/8.jpeg', 87, '97.94', 1, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(23, 'magni', 'Et quod expedita ipsum tempore esse. Vero dolores et possimus quidem. Culpa voluptas odit est aut ducimus. Cumque non deleniti sed voluptatibus nihil consequatur aliquid. Architecto natus aspernatur necessitatibus quidem sed similique quia. Recusandae eius est ut sit nobis vitae voluptatum. Aut ut corrupti reiciendis quis quo.', 'images/products/1.jpeg', 89, '52.22', 4, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(24, 'debitis', 'Aut et sit similique ipsam voluptatem fuga. Et est aut laudantium velit sint doloribus voluptatibus iusto. Esse sint repellendus ducimus perspiciatis nemo minima modi facilis. Assumenda consequatur ducimus iste atque deserunt consequatur. Qui nostrum autem ut velit rerum provident officiis. Velit tenetur ab a qui a excepturi.', 'images/products/17.jpg', 23, '85.18', 3, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(25, 'in', 'Possimus vitae corporis hic consequuntur nostrum. Excepturi aut tempora nesciunt assumenda aut deleniti velit. Autem consequatur eaque eveniet. Odit dolores ipsa reiciendis numquam tempore est. Aut a excepturi officia saepe et dolorum. Sequi in ut ea asperiores excepturi molestiae. Voluptatum laborum et adipisci qui quos qui provident sed.', 'images/products/13.jpeg', 38, '1.75', 5, '2018-05-06 13:32:53', '2018-05-06 13:32:53'),
(26, 'qui', 'Modi culpa expedita eius velit soluta. Non consectetur qui inventore in. Libero et hic rerum et voluptas vel magni eum. Illum quas rem eos sed eligendi. Illo quas animi doloribus suscipit impedit. Sint fuga aut aspernatur laboriosam natus. Dignissimos quia possimus odio molestiae ea nostrum blanditiis.', 'images/products/17.jpg', 14, '33.12', 3, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(27, 'voluptas', 'Iusto saepe aliquid voluptas repellendus saepe. Exercitationem ea et a voluptates hic quibusdam asperiores fugiat. Corrupti velit voluptas possimus recusandae.', 'images/products/11.jpeg', 70, '22.08', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(28, 'est', 'Quidem optio illo enim ut. Facilis amet tenetur sit quas odit velit. Accusantium ut saepe soluta doloribus consequatur et. Quae harum sed et qui reprehenderit aut. Asperiores incidunt qui ut qui modi sit. A consequatur unde dicta qui aut maxime quasi.', 'images/products/6.jpeg', 11, '26.50', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(29, 'repudiandae', 'Consequatur vel nisi aliquid repellendus voluptas et. Eligendi qui tempore minima quibusdam. Exercitationem fugit sit suscipit earum voluptatum quo amet. Consequatur sequi sunt voluptatem et dolore. Tenetur cumque cupiditate tempore dolor velit. Officia natus labore aut aliquam ut. Tempora minus praesentium hic omnis labore.', 'images/products/17.jpg', 15, '16.48', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(30, 'praesentium', 'Qui ipsam delectus minus qui similique quibusdam ut. Officia qui nisi rerum sint omnis doloremque. Officia et similique voluptas consequatur voluptatem sunt recusandae sint. Voluptatibus at similique id nesciunt et aliquid. Non quos voluptate est eos. Nostrum occaecati illo quo qui odit sunt.', 'images/products/18.jpg', 59, '40.96', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(31, 'quo', 'Molestiae quis nisi quia. Velit architecto qui occaecati voluptas delectus. Voluptate officia accusamus tempora ducimus ut illum. Voluptates odit fugit et iusto amet totam. Non dicta et aut cum vero nihil omnis. Expedita similique distinctio facere ullam voluptatem dicta temporibus. Accusamus et eius id nostrum voluptatibus dolore.', 'images/products/1.jpeg', 34, '69.22', 3, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(32, 'ut', 'Rerum in aperiam ducimus consequatur laboriosam. Voluptatum eos veniam doloremque fuga aut. Sequi commodi id cupiditate aut velit. Animi quia aliquid minus quis iure autem accusamus.', 'images/products/5.jpeg', 83, '21.41', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(33, 'neque', 'Dolore pariatur delectus commodi corporis dolorum sint. Vitae animi quis error nemo. Et deserunt earum quibusdam. Occaecati vel qui est eum inventore aspernatur. Voluptatem dignissimos magni dolorum ex et numquam odio. Officiis tempora repellendus amet labore sed. Expedita possimus exercitationem maiores ex cum.', 'images/products/6.jpeg', 77, '42.00', 3, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(34, 'alias', 'Dolorem exercitationem explicabo inventore et vel dolores sunt recusandae. In adipisci et in quae atque eaque. Veritatis error sit non. Asperiores et et quis possimus dicta qui vitae. Eaque sit distinctio voluptatem. Corrupti odit rerum quas dignissimos consequatur et.', 'images/products/4.jpeg', 20, '95.81', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(35, 'quae', 'Iure aut placeat voluptatem aut. Possimus corrupti incidunt harum sed doloribus labore. Earum aliquam ea laboriosam nesciunt perferendis animi. Est sed maiores dolorum qui optio voluptate ut.', 'images/products/2.jpeg', 93, '99.98', 1, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(36, 'labore', 'Dolorem autem autem dignissimos porro et. Similique eos accusantium asperiores et facilis libero. Nostrum sint porro accusantium exercitationem ut. Aut temporibus voluptatem vitae vel quo et.', 'images/products/9.jpeg', 74, '17.77', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(37, 'laborum', 'Possimus odio animi assumenda libero animi repellendus quia illum. Iusto nam et in quasi. Quo officia ullam eos. Dolore ut ut autem necessitatibus. Voluptas illum est adipisci. Sed neque consequuntur eveniet nemo odit. Corrupti quidem sint voluptate maiores modi ipsa. Saepe sequi dolorem qui.', 'images/products/20.jpg', 61, '52.88', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(38, 'vel', 'Sed error odit laborum itaque nisi ea id suscipit. Aut commodi sunt laborum nostrum et reiciendis possimus eos. Labore natus eum neque accusamus et. Accusantium rerum dicta laborum nihil voluptatem nobis officiis tenetur.', 'images/products/10.jpeg', 76, '33.51', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(39, 'aut', 'Vitae vitae qui et fuga. Quasi reiciendis itaque non mollitia et vel suscipit. Eum cumque pariatur non voluptate architecto repellendus sequi. Sed nostrum doloremque est optio. Maiores autem excepturi est sequi porro quis. Qui quidem minus amet vero odit odio error. Facilis cumque possimus alias praesentium et exercitationem.', 'images/products/18.jpg', 11, '10.95', 5, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(40, 'nihil', 'Repudiandae delectus sit quibusdam. Ipsum ipsa mollitia accusantium dolorem magni sunt. Similique debitis sint nostrum architecto. Nostrum qui enim ea facilis laborum. Voluptates vel exercitationem molestiae repellendus et. Nihil nesciunt qui ut minima necessitatibus in. Quibusdam eveniet quia non eligendi ea.', 'images/products/13.jpeg', 12, '72.57', 2, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(41, 'cupiditate', 'Perspiciatis dolorem eligendi perspiciatis quam amet. Architecto inventore quos ipsum fugiat non. Enim ea facilis harum dolorum perferendis quia. Id in voluptas et consequuntur sed reiciendis. Et odio velit corporis. Voluptates voluptatibus odit non. Ea explicabo temporibus quo corrupti eaque sit.', 'images/products/14.jpeg', 44, '71.55', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(42, 'quidem', 'Facilis sit ullam est ut. Laudantium cumque et voluptatem excepturi voluptas qui nobis. Voluptatibus a occaecati voluptas dolores et fugit aut. Quis doloribus quo rerum unde. Alias qui aut hic deserunt voluptatem commodi eum placeat. Aut est voluptate commodi nulla fugit. Eum nam commodi est. Labore autem assumenda maxime totam consequatur.', 'images/products/14.jpeg', 99, '46.91', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(43, 'repellendus', 'Consequuntur voluptate illo amet dicta id et. Fuga enim consequuntur ea dolore voluptas reiciendis. Voluptatem aut iusto placeat blanditiis. Iure quam dignissimos nam dolorem dolorum voluptate. Et adipisci iste enim aut nihil voluptatem. Optio et dolorum vitae et.', 'images/products/15.jpeg', 82, '91.54', 1, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(44, 'dignissimos', 'Et recusandae et perspiciatis impedit vel. Et occaecati rerum vel dolores impedit. Qui amet debitis aut consequuntur molestias error porro. Unde dolorem qui ut molestiae aperiam optio. Voluptatem aut neque quisquam. Aut natus nostrum voluptas.', 'images/products/14.jpeg', 59, '34.66', 1, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(45, 'eos', 'Possimus qui quaerat enim sint esse consequuntur est. Sed perferendis iusto explicabo voluptatibus. Magni minima sed qui. Possimus ut non fugiat provident sint. Id excepturi asperiores accusamus quos. Quis corrupti qui nam. Impedit dolorum ut soluta ea iste id est. Ut ipsum ducimus pariatur aspernatur non.', 'images/products/14.jpeg', 97, '45.33', 4, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(46, 'impedit', 'Tempora excepturi aut qui omnis nobis aut. Consequatur et repellat quis recusandae dolorem. Voluptatibus et numquam harum quibusdam perferendis aperiam.', 'images/products/6.jpeg', 61, '62.35', 2, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(47, 'cumque', 'Nisi quisquam consequatur possimus sunt maxime. Voluptatem et recusandae distinctio dolore culpa quidem voluptates. Aut voluptates aut vitae quibusdam. Esse eos debitis non aut sed repudiandae sunt. Qui et in molestias et fugit. Ex blanditiis deleniti saepe impedit.', 'images/products/17.jpg', 15, '63.24', 1, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(48, 'odit', 'Qui labore minus nihil adipisci aut aut ut ipsa. Est aut tenetur quia vero ipsa exercitationem. Reprehenderit corrupti fugiat quo molestias vel. Reiciendis sunt quia doloribus voluptatibus.', 'images/products/11.jpeg', 65, '35.99', 3, '2018-05-06 13:32:54', '2018-05-06 13:32:54'),
(49, 'dolor', 'Voluptas quae ut pariatur sint id id. Repellat sequi cupiditate nesciunt sed magnam. Est nisi tempora non quos modi vitae. Qui labore cum magni sunt qui voluptas. Eius nemo enim tenetur numquam aperiam harum quia. Ullam iure vero officia veniam qui veritatis. At est aut ducimus explicabo.', 'images/products/18.jpg', 24, '26.32', 5, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(50, 'sint', 'Sit nam impedit earum quos. Suscipit minus ea ut in distinctio qui libero. Vero et dolores in consectetur autem. Aliquid quasi quaerat occaecati ea atque. Fugit vel sequi modi ipsum laborum magni. Facere sit ut hic architecto voluptatem aperiam quidem vel. Molestias aut modi dignissimos quis maxime.', 'images/products/12.jpeg', 84, '21.39', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(51, 'sunt', 'Omnis veniam est quod qui recusandae. Omnis et praesentium vel. Voluptate voluptatem molestiae harum ab. Ratione eum molestiae sunt officia. Eaque et debitis laboriosam perferendis enim ea blanditiis.', 'images/products/19.jpg', 11, '95.14', 3, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(52, 'quisquam', 'Ullam amet facere autem qui. Ut omnis qui inventore ratione. Consectetur nam occaecati est rem et sed. Vel ea laudantium distinctio quae deserunt sunt voluptates ut. Voluptas non voluptatem commodi amet voluptatem. Eaque omnis explicabo nisi et accusamus ab occaecati.', 'images/products/7.jpeg', 70, '28.81', 5, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(53, 'ex', 'Quaerat rerum possimus quae quam asperiores. Aspernatur omnis rerum fugiat ducimus laboriosam voluptatum. Voluptatibus sint aut officia sit velit optio delectus. Numquam in iste quibusdam quibusdam velit. Harum facilis est atque libero. Nam qui quia ratione eos doloremque fugiat. Culpa sit reprehenderit accusamus consequatur sed fugiat autem sit.', 'images/products/1.jpeg', 75, '27.94', 4, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(54, 'eum', 'Sint quidem quo libero nostrum occaecati vel. Dolorum explicabo voluptatem dicta architecto amet. Cupiditate eius quisquam est debitis et. Occaecati suscipit saepe reiciendis perferendis nostrum. Reiciendis aliquid expedita enim iure totam sapiente.', 'images/products/3.jpeg', 42, '43.49', 3, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(55, 'nam', 'Vero architecto occaecati quas culpa consequatur et dicta hic. Cum id aut asperiores aut neque et adipisci porro. Aut inventore iste dolorem ea dolores consequuntur. In iure id voluptas quidem in aut et.', 'images/products/19.jpg', 47, '7.47', 4, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(56, 'voluptatem', 'Sunt distinctio aliquam eveniet aut. Et non voluptatibus veniam qui enim voluptas tenetur. Expedita voluptatem ex libero eius quasi possimus quis. Dignissimos aut veritatis fuga ut dolorem quaerat. Ipsum quisquam nesciunt nam autem voluptatem ut. Itaque ab vero quasi mollitia quisquam sequi.', 'images/products/19.jpg', 14, '14.96', 3, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(57, 'nisi', 'Cupiditate earum voluptas nobis explicabo aliquid illo aperiam eum. Voluptate quis ut ut magnam. Esse quos officiis quia incidunt ut natus et facilis. Distinctio laborum deserunt consequatur. Velit molestiae cum sunt eum blanditiis eum. Quidem dicta aut cupiditate ut aut. Possimus deserunt sit qui sed illum.', 'images/products/10.jpeg', 23, '30.11', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(58, 'voluptates', 'Aperiam sit ad sit quam voluptas. Dolores voluptate voluptates expedita. Cupiditate explicabo sit eos totam quam dicta iusto. Similique aut vel ratione asperiores harum. Et quis beatae optio sunt. Quia praesentium rerum dolorum non.', 'images/products/12.jpeg', 43, '47.26', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(59, 'dolores', 'Rerum vel culpa tempora eius. Id itaque ea et in corporis voluptas quo. Qui et blanditiis itaque quia vel quibusdam. Cum nobis quisquam incidunt commodi. Sit nostrum similique blanditiis in aut. Minus asperiores qui inventore impedit. Officia similique repudiandae architecto id.', 'images/products/9.jpeg', 82, '18.72', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(60, 'occaecati', 'Magni ut ut et amet ut voluptatem consequatur dolorem. Et ullam sapiente quia eos necessitatibus ut. Quia eligendi aliquam similique magnam corporis officia. Ut voluptatibus ducimus qui ea. Est et consequatur quo autem. Eum non nobis nobis ut qui.', 'images/products/19.jpg', 89, '92.15', 5, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(61, 'nobis', 'A aut ipsum illum. At qui illum vel quas beatae doloribus cupiditate. Quis nobis sed nulla qui. Sit libero inventore hic quo ipsum accusamus. Illo enim ea velit et sunt veniam. Aut earum ipsum tenetur non animi vel eum aliquid. Voluptate sunt dolorem explicabo pariatur id.', 'images/products/16.jpg', 82, '66.56', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(62, 'ipsam', 'Suscipit saepe dolorem sit ut quos. Amet quia dolores modi harum et distinctio. Omnis incidunt enim explicabo quia. Cum expedita magnam quod ea ab aut. Porro placeat nulla pariatur harum. Iusto et reiciendis voluptatibus sed aspernatur sunt. Reprehenderit qui dolor saepe. Laudantium voluptatum ipsum earum magnam ipsa.', 'images/products/10.jpeg', 22, '45.90', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(63, 'earum', 'Voluptatem laudantium vel voluptatem dignissimos totam officia velit et. Laborum doloribus error mollitia cum magnam. Et voluptas animi aut eveniet voluptatibus. Aut et blanditiis a corrupti laboriosam velit quo.', 'images/products/1.jpeg', 34, '75.32', 3, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(64, 'molestias', 'Temporibus dolorum quia repellat consectetur hic sunt inventore. Ipsum odit culpa voluptates cumque inventore vitae omnis. Molestiae nobis in ut earum maiores.', 'images/products/12.jpeg', 65, '1.86', 4, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(65, 'deleniti', 'Voluptate recusandae est illum velit a. Fuga ipsa et neque accusamus corporis esse quibusdam. Aut ea aliquam fugiat quam ut quos voluptas. Ratione quo rerum qui molestiae consectetur saepe. Aut quasi ducimus et quo doloribus. Iure alias et sed quia numquam ipsa rerum. Dolores et sit neque ipsum. Saepe adipisci corporis non deleniti vel aliquid.', 'images/products/13.jpeg', 42, '70.80', 2, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(66, 'consequatur', 'Qui quam praesentium dolorem et dolor quo. Amet at possimus eos natus voluptates eum. Ipsum velit minus ipsum voluptas ex. Dolorum autem amet magnam quas omnis incidunt adipisci tempore. Et eos commodi veniam. Atque eligendi non nemo in quod. Dolorem ad necessitatibus amet aut. Voluptates eaque tenetur mollitia qui explicabo.', 'images/products/20.jpg', 79, '58.98', 2, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(67, 'nemo', 'Voluptatem necessitatibus officia magni sed doloremque velit dicta. Ut facilis impedit magnam sequi velit. Perspiciatis voluptatem aut eaque fugiat similique. Debitis excepturi incidunt debitis. Aliquam aliquam consectetur quia qui. Tempora molestias sed iure aspernatur dicta.', 'images/products/2.jpeg', 75, '80.14', 1, '2018-05-06 13:32:55', '2018-05-06 13:32:55'),
(68, 'itaque', 'Molestiae atque magnam atque voluptatum. Magnam necessitatibus ullam veritatis magnam. Omnis cum quis sed sed labore qui. Culpa harum rerum dolor aut sunt et. Id asperiores ullam incidunt et nesciunt nobis rem.', 'images/products/4.jpeg', 62, '22.47', 2, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(69, 'tenetur', 'Pariatur nisi qui voluptate eligendi est accusantium. Et eligendi magni nostrum. Ipsum sit molestias dolore harum suscipit. Aut iure officiis dolore qui soluta eligendi ut. Accusantium ad maiores consequuntur. Dolorem id minus voluptatem sit. Quod dolor consequuntur ut quo enim.', 'images/products/11.jpeg', 82, '80.95', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(70, 'sit', 'Consequatur voluptatum maxime quia sed. Impedit voluptatum non quaerat sit cumque reiciendis aliquam. Nihil sint voluptas animi. Ut est tempore iste numquam hic possimus.', 'images/products/12.jpeg', 84, '56.01', 4, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(71, 'veritatis', 'Omnis temporibus perferendis impedit corporis qui rerum. Quasi repellendus explicabo aut sequi tempore omnis minus. Magni omnis aperiam iure qui illo aut iure. Illo enim aut voluptates facilis culpa. Earum sunt omnis rerum dolore ex. Et sit at sint et officia magnam quo. Ab reiciendis quae itaque sit libero. Aperiam aspernatur eum facere natus.', 'images/products/9.jpeg', 55, '9.36', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(72, 'omnis', 'Rem rem reiciendis blanditiis repellat ratione ullam eum voluptatem. Et nihil eaque incidunt. Aut qui voluptas nostrum explicabo ipsum. Assumenda eos quod quibusdam facere est reprehenderit. Qui laudantium omnis aut possimus porro earum quia. Sed assumenda alias sit enim. Vel expedita quos dolor dignissimos omnis sit.', 'images/products/19.jpg', 96, '21.07', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(73, 'placeat', 'Et ullam voluptatum facilis sint. Praesentium eveniet enim eius eius nulla rem. Minima est reiciendis quis. Est fugit accusamus ex et aperiam deserunt. Officia quae omnis praesentium numquam sed dolores.', 'images/products/13.jpeg', 11, '56.22', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(74, 'inventore', 'Voluptatem fugit ipsam sit soluta quam quia ad. Inventore id consequuntur quia beatae. Asperiores magni reiciendis ratione ipsam harum. Id enim veniam ipsa dolores. Quaerat qui deserunt laboriosam saepe. Nulla optio et assumenda blanditiis. Omnis rerum molestias blanditiis dolore similique. Quisquam corporis dicta voluptates.', 'images/products/3.jpeg', 81, '96.98', 4, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(75, 'culpa', 'Ullam molestias facilis porro cupiditate enim. Dolorum itaque architecto optio nam rerum odio voluptate id. Sit et recusandae dolores aut laboriosam saepe. Voluptas eligendi tenetur sit laborum velit.', 'images/products/5.jpeg', 33, '39.68', 1, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(76, 'totam', 'Quia esse excepturi aut incidunt. Eum deleniti deleniti id nemo. Et doloremque est quo repudiandae et libero suscipit nobis.', 'images/products/20.jpg', 21, '88.31', 2, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(77, 'quibusdam', 'Ut eligendi et sint sed. Eos fugit consequatur voluptates veritatis qui enim assumenda nam. Expedita et molestias unde aut est quo. Quasi et nemo maiores. Mollitia sed et in quo exercitationem consequatur. Molestiae dicta sapiente aut et eveniet enim. Nemo similique blanditiis et ea animi.', 'images/products/5.jpeg', 68, '40.99', 4, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(78, 'fuga', 'Rerum ex est harum aut blanditiis ullam. Asperiores vel assumenda aliquid itaque illo vitae modi. Optio vero iure odio quo aut ab. Quis eveniet occaecati quaerat reprehenderit sed facere consectetur. Ratione ratione in mollitia eius doloremque. Cum ut est saepe fugiat aperiam. Quas dolore est doloribus voluptas.', 'images/products/6.jpeg', 87, '5.46', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(79, 'deserunt', 'Doloribus quaerat ex porro maxime est maiores cumque. Aut et consequatur ad. Error molestias odio placeat adipisci. Corporis voluptas quae atque voluptatibus ipsum temporibus voluptatem. Iure tenetur accusantium et necessitatibus consequatur minus voluptas. Harum optio est quidem amet.', 'images/products/16.jpg', 84, '58.53', 4, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(80, 'excepturi', 'Sit sit autem est molestiae. Aut libero omnis minima qui. Ipsam eos ipsa et reprehenderit enim ab laboriosam. Quas error et nemo quia nemo aspernatur similique dolores. Est voluptate optio maiores aut reprehenderit et voluptate veniam. Aperiam dolorem ab deserunt repellat. Tempore nisi nemo praesentium cum.', 'images/products/16.jpg', 32, '51.86', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(81, 'possimus', 'Suscipit iusto iure necessitatibus excepturi doloremque. Quod id aliquam fugiat sunt enim ratione. Perspiciatis ipsa totam animi officia quaerat amet in. Id quaerat est accusamus doloribus qui nihil. Rem sapiente et tempora excepturi tempora qui. Dolorem est debitis numquam. Aut odit sed odit architecto ea dolores.', 'images/products/14.jpeg', 61, '79.77', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(82, 'voluptatum', 'Sit quaerat natus aut saepe et officia placeat. Distinctio ullam omnis deserunt minima fugiat sunt eaque. Vero harum dolores voluptatum. Placeat nam qui necessitatibus nulla laboriosam. Amet voluptatem ad qui vitae eos sit. Facilis voluptates id quia aut quibusdam voluptates unde.', 'images/products/9.jpeg', 84, '14.34', 2, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(83, 'a', 'Provident omnis consequatur assumenda ad voluptatum incidunt itaque. Et reiciendis dicta velit dolorem blanditiis vitae. Consequuntur dolorum quia eligendi quisquam cum repudiandae. Id aperiam sint in quidem. Ab magnam sed assumenda nobis soluta. Ab sed dolorum sunt occaecati sed.', 'images/products/14.jpeg', 89, '72.95', 5, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(84, 'ratione', 'Qui blanditiis vel numquam harum enim similique blanditiis illum. Illo autem eveniet eveniet consequatur ducimus ullam. Quisquam cum eaque molestiae. In impedit et quam. Voluptatem quia voluptatibus voluptas laboriosam voluptate explicabo. Amet quis suscipit velit et.', 'images/products/9.jpeg', 94, '68.47', 4, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(85, 'distinctio', 'In eius nihil autem nulla. Velit natus ut eos commodi beatae rem. Ipsum rerum enim eligendi et dolore laboriosam autem odio. Assumenda harum dolor eum aperiam. Dolorem soluta et aut corporis dolor sit voluptatem. Beatae ipsam aliquid repudiandae et et fugit quos. Veniam ut sint iusto aspernatur quod iusto et magnam.', 'images/products/13.jpeg', 97, '49.14', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(86, 'rem', 'Expedita magni optio voluptas sint maiores eum. Ea laudantium enim necessitatibus veritatis. Consequuntur hic laudantium non asperiores aut. Alias aliquam doloremque amet eum inventore sunt eveniet qui. Et officia dicta mollitia aliquid quis. Fugiat praesentium ipsum quia itaque. Id sed qui totam fugiat consequatur libero explicabo.', 'images/products/3.jpeg', 23, '83.42', 1, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(87, 'eligendi', 'Corporis tempore expedita eveniet incidunt quia qui. Porro quod sit ut eum. Nam tempora aut reprehenderit aut dolores. Totam et porro qui eum quis. Nemo et ullam et vel aut. Non mollitia perferendis eum. Ipsam qui provident laborum accusantium voluptas suscipit ipsa. Ipsa sit dolorem labore quaerat a voluptatum. Aut ut optio autem sed ea.', 'images/products/12.jpeg', 81, '3.11', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(88, 'corrupti', 'Et sed similique dolor quos quo enim. Accusamus odio itaque delectus ipsum. Quis et voluptate placeat voluptatibus. Cupiditate aliquid eius itaque sed et blanditiis. Rerum aut perferendis sunt dicta ducimus autem est. Omnis veniam possimus est sapiente.', 'images/products/8.jpeg', 77, '95.33', 1, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(89, 'voluptate', 'Doloremque quidem dolorum consectetur suscipit dolorum. Est occaecati autem cupiditate harum eum magnam. Est neque ratione adipisci ad qui quia. Accusamus molestiae nihil quas laboriosam. Omnis voluptas quidem exercitationem corrupti voluptatem suscipit. Ex omnis id occaecati est. Voluptate quo cumque libero natus vitae et a.', 'images/products/6.jpeg', 34, '56.82', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(90, 'dolorem', 'Tempora nisi fugit vel ullam. Non voluptatem perferendis accusamus provident temporibus cupiditate et. Rerum facilis velit velit quia. Culpa aut deserunt delectus est perspiciatis distinctio molestiae.', 'images/products/9.jpeg', 73, '54.93', 3, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(91, 'perferendis', 'Consequatur quae molestiae nostrum animi. Vitae molestiae aut sed quo architecto. Ut natus sit voluptatem accusantium quasi. Ut ut et minus ipsa. Sed asperiores vitae enim doloribus.', 'images/products/14.jpeg', 34, '61.91', 1, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(92, 'officia', 'Doloribus reprehenderit est cumque quaerat. Accusamus nesciunt dolor id laudantium nesciunt reiciendis. Est et esse id quia corrupti numquam vitae. Sit suscipit fuga et ratione molestiae eius. Ut non hic aliquam odit et quo dolores.', 'images/products/16.jpg', 54, '40.87', 1, '2018-05-06 13:32:56', '2018-05-06 13:32:56'),
(93, 'eius', 'Aut voluptas hic accusantium eligendi sunt. Quis commodi totam dolore. Voluptas modi voluptatem et sit commodi. Molestias impedit dolorem sit nihil ad possimus et iure. Veniam dignissimos molestiae occaecati est sunt consequatur. Enim sed odio quia itaque et.', 'images/products/14.jpeg', 62, '68.10', 5, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(94, 'ipsum', 'Porro non sint dolores aliquam. Ab impedit dolor ducimus magnam architecto. Vero nisi distinctio dicta qui rerum ipsa aut. Illum aliquid nam dolorem sit at. Nostrum sed voluptas sint explicabo ducimus. Nesciunt id illo consectetur nemo.', 'images/products/12.jpeg', 43, '64.67', 3, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(95, 'assumenda', 'Quaerat sed repudiandae qui in eos. Est delectus nisi possimus quia hic sed quo. Rem asperiores repellendus reprehenderit unde ea maiores. Expedita rerum architecto voluptate consequatur rerum doloribus id.', 'images/products/15.jpeg', 44, '65.96', 1, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(96, 'aspernatur', 'Labore quasi maiores et quam et repellat autem. Soluta tempora minus cumque vero. Doloremque reiciendis sit vero esse aliquid accusantium rem. Rerum qui fugiat corrupti doloremque occaecati. Exercitationem ut debitis eius dignissimos.', 'images/products/17.jpg', 87, '93.86', 1, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(97, 'ducimus', 'Soluta voluptatibus eveniet aut voluptate. Dicta qui ipsum et rerum. Qui officiis sed et consequatur. Quaerat eveniet consectetur aspernatur voluptatem. Saepe autem ut inventore placeat. Doloremque esse voluptatem quaerat autem vel voluptatum. Similique repellat omnis alias enim illum harum ex. Totam eligendi vel quaerat magni nihil alias.', 'images/products/12.jpeg', 67, '18.34', 2, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(98, 'natus', 'Rerum corrupti recusandae optio quo culpa nobis animi. Repellendus animi velit quia sapiente. Quasi et nemo quas modi sed animi magni.', 'images/products/8.jpeg', 50, '13.67', 5, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(99, 'iusto', 'Minus molestiae quod dolorem nobis consequuntur voluptate sint quam. Tempora distinctio corrupti asperiores qui voluptatem. Et eveniet eius error ut vitae doloribus qui. Placeat aut atque commodi culpa.', 'images/products/12.jpeg', 23, '30.17', 2, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(100, 'delectus', 'Tempore voluptas quae et explicabo. Sed natus et quia delectus magnam numquam. Inventore veritatis velit corrupti voluptatum non. Corporis deserunt rerum possimus odit aut. Dolorem vel deserunt autem et accusamus occaecati sint. Rerum accusantium earum eum accusantium quas.', 'images/products/4.jpeg', 95, '77.86', 2, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(101, 'animi', 'Necessitatibus suscipit molestiae vero aliquid voluptatem earum qui autem. Et molestiae explicabo quam et unde veritatis et inventore. Sunt necessitatibus sed iusto distinctio et quia. Quasi quasi commodi et consectetur autem.', 'images/products/14.jpeg', 36, '26.06', 2, '2018-05-06 13:32:57', '2018-05-06 13:32:57'),
(102, 'tempore', 'Harum consequuntur architecto repudiandae aspernatur sed perspiciatis et. Est eos eos quae odit. Cumque consequuntur dolorem non deleniti cupiditate ex qui accusamus. Cupiditate voluptatem ut esse earum quia dolores.', 'images/products/10.jpeg', 81, '23.69', 5, '2018-05-06 13:32:57', '2018-05-06 13:32:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id` int(10) UNSIGNED NOT NULL,
  `idproducto` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcliente` int(10) UNSIGNED DEFAULT NULL,
  `idempleado` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_pago`
--

CREATE TABLE `reserva_pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `idreserva` int(10) UNSIGNED NOT NULL,
  `idpago` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Bebidas', '1', NULL, NULL),
(2, 'Alquiler', '1', NULL, NULL),
(3, 'Polos', '1', NULL, NULL),
(4, 'Peotas', '1', NULL, NULL),
(5, 'Articulos deportivos', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `dni`, `telefono`, `rol`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhonnatan', 'Yontonel Sotelo', '47803338', '2356956', '0', 'jcyontonel@gmail.com', '$2y$10$laGv4waXY5JJre3vjKo5vOektw04m/S27o3A6efwuEqI0pmpg2t2C', NULL, NULL, NULL),
(2, 'Michael', 'Palacios', '14336796', '1-800-274-4474', '1', 'mpalacios@gmail.com', '$2y$10$laGv4waXY5JJre3vjKo5vOektw04m/S27o3A6efwuEqI0pmpg2t2C', 'rU3Eg4c9i9CRtKueD84eUIOv4FYw3jx5XTtTAQQcZ9lOFLwfwilV8xIaEyn9', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(3, 'Providenci Stehr', 'Langworth', '69952236', '800.758.4374', '2', 'oconner.jedidiah@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ysSuRYoPiP', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(4, 'Iva Bogan', 'Metz', '16617684', '(855) 766-6989', '2', 'avery.dickinson@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'neixvgXTux', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(5, 'Prof. Lillian Bosco', 'Bednar', '9726065', '800.785.4654', '1', 'collins.arvilla@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'i8DEaYCkR7', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(6, 'Neil Kozey', 'Reichel', '60294081', '877-645-9339', '1', 'laura10@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'p1RS76tTCa', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(7, 'Mr. Trenton Schroeder', 'Schroeder', '82574912', '(844) 917-5238', '2', 'rcollier@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'MR5nP7wjEv', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(8, 'Fabiola Luettgen', 'McGlynn', '88702875', '844-689-1950', '2', 'maritza08@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mQbyzyJrZ9', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(9, 'Gilda Streich V', 'Wilderman', '65557427', '1-855-242-1733', '2', 'wuckert.garth@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '5BVTeaxmCc', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(10, 'Hermina Aufderhar', 'Dooley', '69470086', '(877) 815-2346', '1', 'darrel.wiza@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'fUTtqByMY0', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(11, 'Noah Rutherford', 'Lemke', '16403836', '855.714.2124', '1', 'xlueilwitz@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'xX1ZVkVrK1', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(12, 'Meagan Beier', 'Schinner', '11127580', '855.208.5674', '2', 'corkery.orlo@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'CdslxadUba', '2018-05-06 13:32:50', '2018-05-06 13:32:50'),
(13, 'Ms. Elenor Carroll III', 'Schinner', '68451071', '1-866-241-9142', '1', 'bogisich.april@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '9shPxW8pwq', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(14, 'Stephon Mills', 'Tremblay', '31430680', '(844) 889-4402', '1', 'dickens.holly@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8EW8XwGauW', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(15, 'Mr. Vincenzo Beatty', 'Ebert', '71649667', '(877) 974-1568', '2', 'ruecker.hildegard@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ZfP98dC3FA', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(16, 'Kaelyn Wilkinson', 'Parker', '26925467', '1-844-436-7262', '2', 'haylie.kiehn@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'hZrmRFASfs', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(17, 'Lillie Wolf', 'Turcotte', '69460364', '855.588.6107', '2', 'savion92@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'rA47zrxyij', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(18, 'Caleigh Champlin', 'Schoen', '92875173', '1-844-622-7308', '2', 'gorczany.chelsey@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'i7Fq5Mbaqx', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(19, 'Dr. Demond Sawayn V', 'Ebert', '59617693', '(877) 859-5631', '2', 'destin48@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'QsuYQBlV2S', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(20, 'Justine Franecki', 'Walter', '11327757', '855.456.2990', '1', 'labadie.hilma@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'nAKvAKbD7F', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(21, 'Jayce Hills', 'Hackett', '46125714', '1-866-234-1830', '2', 'johann03@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'g1MR68uzQb', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(22, 'Era VonRueden', 'Daugherty', '10331252', '855-743-3329', '2', 'crooks.samara@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3VIEEXKaQf', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(23, 'Prof. Deangelo Streich II', 'Gorczany', '45074226', '800-948-8985', '2', 'bboehm@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'XTdFYMJmuS', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(24, 'Prof. Gerald O\'Reilly DVM', 'Block', '99698236', '1-844-364-4664', '1', 'garrison57@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '6NPzX8ARpT', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(25, 'Gunner Wilderman', 'Nolan', '10589951', '866-398-8717', '2', 'addie.stanton@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3Q1wmmYdYS', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(26, 'Ms. Wilhelmine Harris DDS', 'Marquardt', '22299710', '(800) 533-5124', '2', 'emma.osinski@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tcz6KawKJu', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(27, 'Mr. Antwon Wuckert', 'Weber', '29965739', '855-893-8777', '2', 'gussie.cremin@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'FixcPfb4AG', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(28, 'Prof. Henry Marquardt', 'Robel', '66575286', '866-315-8540', '1', 'jammie49@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'njW94ErFjg', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(29, 'Dr. Moshe Stehr Sr.', 'Schinner', '62845069', '1-844-322-9338', '2', 'karley.champlin@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Dkqi3k3HXg', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(30, 'Mr. Joey Monahan', 'Bechtelar', '52968166', '1-888-722-5241', '1', 'eichmann.fay@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'KKVE2f4kvw', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(31, 'Maye Harvey', 'O\'Kon', '1475035', '1-877-409-8674', '2', 'xtowne@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'SroLGPYLOP', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(32, 'Trinity Lueilwitz', 'Waelchi', '47101938', '1-844-335-3347', '2', 'ardella90@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ynRaTKQ7nO', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(33, 'Manuela Stroman', 'Rohan', '94302054', '800-514-9877', '1', 'chessel@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'uaPiydjPgc', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(34, 'Edna Flatley', 'White', '87368348', '(866) 250-2376', '1', 'cjones@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qbijfJ7MEE', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(35, 'Jeffery McGlynn PhD', 'Harvey', '54459853', '855-459-1742', '2', 'eryn69@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'r6L0P7el2o', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(36, 'Dandre Sawayn', 'Rolfson', '93362470', '(844) 878-8235', '2', 'nickolas.weissnat@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ccI8LyTKh0', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(37, 'Dr. Tyrell Mann Sr.', 'Dickinson', '52658601', '877.925.1793', '2', 'greichel@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qVSmFoAmR2', '2018-05-06 13:32:51', '2018-05-06 13:32:51'),
(38, 'Elody McDermott', 'Crooks', '97744088', '877.531.5548', '2', 'kim.moore@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'HqgmIZxjxd', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(39, 'Prof. Brooks Dietrich II', 'Maggio', '83453467', '(844) 269-4272', '2', 'jessyca78@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'PoUD9Mku2d', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(40, 'Derick Pacocha', 'Cole', '92006953', '(855) 795-8111', '1', 'shanel99@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eRg7JsnHrn', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(41, 'Mitchell Olson', 'Sauer', '32955908', '888-289-6143', '2', 'scrooks@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'QAcu2KOIqi', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(42, 'Miss Vivienne Volkman', 'Boehm', '89999372', '1-800-574-9867', '1', 'blaze86@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '9wc6kM8trP', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(43, 'Prof. Oma Bosco Sr.', 'Koelpin', '33964836', '1-800-833-0658', '1', 'wokon@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'xQkdJVeu7P', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(44, 'Dr. Hertha Klein', 'Morissette', '32937862', '844.522.4698', '2', 'melisa17@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'YdjPG14Mbq', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(45, 'Dr. Cara Abbott', 'Ziemann', '17121973', '800-413-6599', '1', 'donato46@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '5YyBUzyQEH', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(46, 'Garry Schowalter V', 'Pollich', '49662317', '855-679-1721', '2', 'ondricka.wilfredo@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'YFeB6Vuwv4', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(47, 'Brando Bechtelar', 'Romaguera', '55383258', '(800) 816-0105', '1', 'dfisher@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jiw4RlGUBA', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(48, 'Rosario Morissette', 'Labadie', '91310306', '(888) 274-5681', '2', 'bradtke.leda@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Bnxlw14x8y', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(49, 'Katrine Ratke', 'Moen', '16498530', '1-855-272-2059', '2', 'walsh.cyril@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8XJmrOgIzy', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(50, 'Mr. Tremaine Connelly', 'Wisozk', '43098255', '1-800-771-6602', '2', 'uframi@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'fCiKSQQj1i', '2018-05-06 13:32:52', '2018-05-06 13:32:52'),
(51, 'Prof. Keon Bartell', 'Thompson', '83653854', '800.663.8859', '1', 'cmraz@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eSL1sVmkV8', '2018-05-06 13:32:52', '2018-05-06 13:32:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcliente` int(10) UNSIGNED NOT NULL,
  `idempleado` int(10) UNSIGNED NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_pago`
--

CREATE TABLE `venta_pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `idpago` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cancha_nombre_unique` (`nombre`);

--
-- Indices de la tabla `cancha_reserva`
--
ALTER TABLE `cancha_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancha_reserva_idcancha_foreign` (`idcancha`),
  ADD KEY `cancha_reserva_idreserva_foreign` (`idreserva`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_iduser_foreign` (`iduser`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_iduser_foreign` (`iduser`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pago_idempleado_foreign` (`idempleado`),
  ADD KEY `pago_idtipopago_foreign` (`idtipopago`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producto_nombre_unique` (`nombre`),
  ADD KEY `producto_idtipoproducto_foreign` (`idtipoproducto`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_venta_idproducto_foreign` (`idproducto`),
  ADD KEY `producto_venta_idventa_foreign` (`idventa`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_idcliente_foreign` (`idcliente`),
  ADD KEY `reserva_idempleado_foreign` (`idempleado`);

--
-- Indices de la tabla `reserva_pago`
--
ALTER TABLE `reserva_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_pago_idreserva_foreign` (`idreserva`),
  ADD KEY `reserva_pago_idpago_foreign` (`idpago`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_pago_nombre_unique` (`nombre`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_idcliente_foreign` (`idcliente`),
  ADD KEY `venta_idempleado_foreign` (`idempleado`);

--
-- Indices de la tabla `venta_pago`
--
ALTER TABLE `venta_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_pago_idventa_foreign` (`idventa`),
  ADD KEY `venta_pago_idpago_foreign` (`idpago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancha`
--
ALTER TABLE `cancha`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cancha_reserva`
--
ALTER TABLE `cancha_reserva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva_pago`
--
ALTER TABLE `reserva_pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `venta_pago`
--
ALTER TABLE `venta_pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancha_reserva`
--
ALTER TABLE `cancha_reserva`
  ADD CONSTRAINT `cancha_reserva_idcancha_foreign` FOREIGN KEY (`idcancha`) REFERENCES `cancha` (`id`),
  ADD CONSTRAINT `cancha_reserva_idreserva_foreign` FOREIGN KEY (`idreserva`) REFERENCES `reserva` (`id`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_idempleado_foreign` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `pago_idtipopago_foreign` FOREIGN KEY (`idtipopago`) REFERENCES `tipo_pago` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_idtipoproducto_foreign` FOREIGN KEY (`idtipoproducto`) REFERENCES `tipo_producto` (`id`);

--
-- Filtros para la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD CONSTRAINT `producto_venta_idproducto_foreign` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `producto_venta_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `reserva_idempleado_foreign` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `reserva_pago`
--
ALTER TABLE `reserva_pago`
  ADD CONSTRAINT `reserva_pago_idpago_foreign` FOREIGN KEY (`idpago`) REFERENCES `pago` (`id`),
  ADD CONSTRAINT `reserva_pago_idreserva_foreign` FOREIGN KEY (`idreserva`) REFERENCES `reserva` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venta_idempleado_foreign` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `venta_pago`
--
ALTER TABLE `venta_pago`
  ADD CONSTRAINT `venta_pago_idpago_foreign` FOREIGN KEY (`idpago`) REFERENCES `pago` (`id`),
  ADD CONSTRAINT `venta_pago_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `venta` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
