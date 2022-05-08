<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'chalet_et_caviar' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'RbRe?KLFj[0;jdY8o&*u`IEnOQq^Do9Je9g@{W_T[NiU0l*Z>q>h0-=5v]pR}.,9' );
define( 'SECURE_AUTH_KEY',  '[&#|42NUi-k6.*7>yzFyuGa&|G)/|^>2m,)thOq;x>H5bTp7`d0b@sgOhw4N>KOG' );
define( 'LOGGED_IN_KEY',    'd*4L)VV&{C[q9$k(<6Kh?O1}nx$T8?P!#DY_n0`P>VTuTLtbL8E!-ai`GTF)pfxm' );
define( 'NONCE_KEY',        ':C5)G|tAtbga$,{(ge?15ld^:J2i*eRP|swJX._Vd#oj#=x,7pf7whHSOR6Ka_d?' );
define( 'AUTH_SALT',        '3g`xP[ut@b3gLpCnr/9{v o-D>UHnj_v3Bm%hu{W,WL:~z;;t(+de{{V<pSD_,IQ' );
define( 'SECURE_AUTH_SALT', '?N7H>FKm)}rno9:z{(SU8:n}sj%I{-bs.Y:?ut6myfP2#!%YjBF(`}ue@1AFhsC@' );
define( 'LOGGED_IN_SALT',   'I<i[d1dhZl+9]fjf=C}jtV`pF}wf4DH;F571O|{328!GJ{z]=X5H|B/S5(|]Gpsu' );
define( 'NONCE_SALT',       '1&p2q <OF|6Y9>L/4ZwjpO)<)cp{;jV{gP>zJ-Ng8;1soCMhPsiW/1=*B`sU_rdB' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
