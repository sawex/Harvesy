<?php
/**
 * Template part for displaying header social links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Harvesy
 * @since 1.0.0
 */

/* @var array $social_links */
$social_links = get_field( 'social_links', 'option' );

/* @var string $inst_link */
$inst_link = esc_url( $social_links['instagram'] );

/* @var string $viber_number */
$viber_number = $social_links['viber'];

/* @var string $viber_link */
$viber_link = esc_url( add_query_arg( [
  'number' => $viber_number,
], 'viber://contact' ), ['viber'] );

/* @var string $telegram_name */
$telegram_name = $social_links['telegram'];

/* @var string $telegram_link */
$telegram_link = esc_url( sprintf( 'https://t.me/%s', $telegram_name ) );

/* @var string $whatsapp_number */
$whatsapp_number = $social_links['whatsapp'];

/* @var string $whatsapp_link */
$whatsapp_link = esc_url( add_query_arg( [
  'phone' => $whatsapp_number,
], 'https://api.whatsapp.com/send' ) );

/* @var string $email */
$email = sanitize_email( $social_links['email'] );

/* @var string $phone */
$phone = esc_attr( $social_links['phone'] );
?>

<div class="textwidget">
  <ul class="mobile-header__social-menu">
    <li class="mobile-header__social-open-list mobile-header__social-list">
      <button class="main-header__nav-link mobile-header__social-menu--open-btn"
              aria-haspopup="true"
              aria-label="<?php esc_attr_e( 'Open social menu', 'mst_harvesy' ); ?>">
      </button>

      <ul class="mobile-header__social-menu--dropdown"
          aria-label="<?php esc_attr_e( 'Submenu', 'mst_harvesy' ); ?>">

        <?php if ( ! empty( $inst_link ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo $inst_link; ?>" class="mobile-header__social-link" aria-label="Instagram">
              <svg class="social-img" viewbox="0 0 512.00096 512.00096" xmlns="http://www.w3.org/2000/svg"><path d="m373.40625 0h-234.8125c-76.421875 0-138.59375 62.171875-138.59375 138.59375v234.816406c0 76.417969 62.171875 138.589844 138.59375 138.589844h234.816406c76.417969 0 138.589844-62.171875 138.589844-138.589844v-234.816406c0-76.421875-62.171875-138.59375-138.59375-138.59375zm108.578125 373.410156c0 59.867188-48.707031 108.574219-108.578125 108.574219h-234.8125c-59.871094 0-108.578125-48.707031-108.578125-108.574219v-234.816406c0-59.871094 48.707031-108.578125 108.578125-108.578125h234.816406c59.867188 0 108.574219 48.707031 108.574219 108.578125zm0 0"/><path d="m256 116.003906c-77.195312 0-139.996094 62.800782-139.996094 139.996094s62.800782 139.996094 139.996094 139.996094 139.996094-62.800782 139.996094-139.996094-62.800782-139.996094-139.996094-139.996094zm0 249.976563c-60.640625 0-109.980469-49.335938-109.980469-109.980469 0-60.640625 49.339844-109.980469 109.980469-109.980469 60.644531 0 109.980469 49.339844 109.980469 109.980469 0 60.644531-49.335938 109.980469-109.980469 109.980469zm0 0"/><path d="m399.34375 66.285156c-22.8125 0-41.367188 18.558594-41.367188 41.367188 0 22.8125 18.554688 41.371094 41.367188 41.371094s41.371094-18.558594 41.371094-41.371094-18.558594-41.367188-41.371094-41.367188zm0 52.71875c-6.257812 0-11.351562-5.09375-11.351562-11.351562 0-6.261719 5.09375-11.351563 11.351562-11.351563 6.261719 0 11.355469 5.089844 11.355469 11.351563 0 6.257812-5.09375 11.351562-11.355469 11.351562zm0 0"/></svg>
            </a>
          </li>
        <?php } ?>

        <?php if ( ! empty( $viber_number ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo $viber_link; ?>" class="mobile-header__social-link" aria-label="Viber">
              <svg xmlns="http://www.w3.org/2000/svg" class="social-img" viewbox="0 0 52.511 52.511"><path d="M31.256 0H21.254C10.778 0 2.255 8.521 2.255 18.995v9.01c0 7.8 4.793 14.81 12 17.665v5.841a.999.999 0 0 0 1.671.741L21.725 47h9.531c10.476 0 18.999-8.521 18.999-18.995v-9.01C50.255 8.521 41.732 0 31.256 0zm16.999 28.005C48.255 37.376 40.63 45 31.256 45h-9.917a.998.998 0 0 0-.671.259l-4.413 3.997v-4.279a.997.997 0 0 0-.667-.942 17.03 17.03 0 0 1-11.333-16.03v-9.01C4.255 9.624 11.881 2 21.254 2h10.002c9.374 0 16.999 7.624 16.999 16.995v9.01z"/><path d="M39.471 30.493l-6.146-3.992a2.994 2.994 0 0 0-4.15.88l-.289.444c-2.66-.879-5.593-2.002-7.349-7.085l.727-.632a3.005 3.005 0 0 0 .294-4.233l-4.808-5.531a1.001 1.001 0 0 0-1.411-.099l-3.019 2.624c-2.648 2.302-1.411 5.707-1.004 6.826.018.05.04.098.066.145.105.188 2.612 4.662 6.661 8.786 4.065 4.141 11.404 7.965 11.629 8.076a5.006 5.006 0 0 0 6.916-1.47l2.178-3.354c.3-.465.168-1.084-.295-1.385zm-3.561 3.649c-.901 1.388-2.763 1.782-4.233.834-.073-.038-7.364-3.835-11.207-7.75-3.592-3.659-5.977-7.724-6.302-8.291-.792-2.221-.652-3.586.464-4.556l2.265-1.968 4.152 4.776a.99.99 0 0 1-.096 1.411l-1.227 1.066a.999.999 0 0 0-.3 1.049c2.092 6.798 6.16 8.133 9.13 9.108l.433.143a.996.996 0 0 0 1.155-.403l.709-1.092a.988.988 0 0 1 .63-.434.99.99 0 0 1 .753.143l5.308 3.447-1.634 2.517zM28.538 16.247a1 1 0 1 0-.548 1.923 4.524 4.524 0 0 1 3.097 3.104 1 1 0 0 0 1.925-.542 6.538 6.538 0 0 0-4.474-4.485z"/><path d="M36.148 22.219a1 1 0 0 0 .963-1.271c-1.18-4.183-4.509-7.519-8.689-8.709a1 1 0 1 0-.547 1.924c3.517 1 6.318 3.809 7.311 7.328a1 1 0 0 0 .962.728z"/><path d="M27.991 7.582a1 1 0 1 0-.548 1.924c5.959 1.695 10.706 6.453 12.388 12.416a1 1 0 0 0 1.925-.542c-1.869-6.627-7.143-11.913-13.765-13.798z"/></svg>
            </a>
          </li>
        <?php } ?>

        <?php if ( ! empty( $telegram_name ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo $telegram_link; ?>" class="mobile-header__social-link" aria-label="Telegram">
              <svg class="social-img" height="512pt" viewbox="0 -39 512.00011 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m504.09375 11.859375c-6.253906-7.648437-15.621094-11.859375-26.378906-11.859375-5.847656 0-12.042969 1.230469-18.410156 3.664062l-433.398438 165.441407c-23 8.777343-26.097656 21.949219-25.8984375 29.019531s4.0390625 20.046875 27.4999995 27.511719c.140626.042969.28125.085937.421876.125l89.898437 25.726562 48.617187 139.023438c6.628907 18.953125 21.507813 30.726562 38.835938 30.726562 10.925781 0 21.671875-4.578125 31.078125-13.234375l55.605469-51.199218 80.652344 64.941406c.007812.007812.019531.011718.027343.019531l.765625.617187c.070313.054688.144532.113282.214844.167969 8.964844 6.953125 18.75 10.625 28.308594 10.628907h.003906c18.675781 0 33.546875-13.824219 37.878906-35.214844l71.011719-350.640625c2.851563-14.074219.460937-26.667969-6.734375-35.464844zm-356.191406 234.742187 173.441406-88.605468-107.996094 114.753906c-1.769531 1.878906-3.023437 4.179688-3.640625 6.683594l-20.824219 84.351562zm68.132812 139.332032c-.71875.660156-1.441406 1.25-2.164062 1.792968l19.320312-78.25 35.144532 28.300782zm265.390625-344.566406-71.011719 350.644531c-.683593 3.355469-2.867187 11.164062-8.480468 11.164062-2.773438 0-6.257813-1.511719-9.824219-4.257812l-91.390625-73.585938c-.011719-.011719-.027344-.023437-.042969-.03125l-54.378906-43.789062 156.175781-165.949219c5-5.3125 5.453125-13.449219 1.074219-19.285156-4.382813-5.835938-12.324219-7.671875-18.820313-4.351563l-256.867187 131.226563-91.121094-26.070313 433.265625-165.390625c3.660156-1.398437 6.214844-1.691406 7.710938-1.691406.917968 0 2.550781.109375 3.15625.855469.796875.972656 1.8125 4.289062.554687 10.511719zm0 0"/></svg>
            </a>
          </li>
        <?php } ?>

        <?php if ( ! empty( $whatsapp_number ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo $whatsapp_link; ?>" class="mobile-header__social-link" aria-label="Whatsapp">
              <svg xmlns="http://www.w3.org/2000/svg" class="social-img" viewbox="0 0 512 512"><path d="M439.277 72.723C392.38 25.824 330.04 0 263.711 0h-.023c-32.805.004-64.774 6.355-95.012 18.883-30.242 12.527-57.336 30.64-80.535 53.84-46.895 46.894-72.72 109.246-72.72 175.566 0 39.55 9.544 78.856 27.626 113.875L1.313 481.391c-2.942 8.41-.86 17.55 5.445 23.851C11.168 509.656 16.973 512 22.94 512c2.559 0 5.145-.43 7.668-1.313l119.227-41.73c35.02 18.082 74.324 27.625 113.875 27.625 66.32 0 128.668-25.828 175.566-72.723C486.172 376.965 512 314.613 512 248.293c0-66.324-25.824-128.676-72.723-175.57zm-21.234 329.902c-41.223 41.227-96.035 63.926-154.332 63.926-35.664 0-71.094-8.82-102.461-25.516-5.687-3.023-12.41-3.543-18.445-1.43l-108.32 37.91 37.913-108.32c2.114-6.043 1.59-12.765-1.433-18.449-16.692-31.36-25.516-66.789-25.516-102.457 0-58.297 22.703-113.11 63.926-154.332 41.219-41.219 96.023-63.922 154.316-63.93h.02c58.3 0 113.11 22.703 154.332 63.93 41.227 41.223 63.93 96.031 63.93 154.332 0 58.3-22.703 113.113-63.93 154.336zm0 0"/><path d="M355.984 270.469c-11.421-11.422-30.007-11.422-41.43 0l-12.491 12.492c-31.02-16.902-56.122-42.004-73.028-73.024l12.492-12.492c11.426-11.422 11.426-30.007 0-41.43l-33.664-33.663c-11.422-11.422-30.008-11.422-41.43 0l-26.93 26.93c-15.425 15.425-16.194 41.945-2.167 74.675 12.18 28.418 34.469 59.652 62.762 87.945 28.293 28.293 59.527 50.582 87.945 62.762 15.55 6.664 29.695 9.988 41.918 9.988 13.504 0 24.66-4.058 32.758-12.156l26.93-26.934v.004c5.535-5.535 8.581-12.89 8.581-20.714 0-7.829-3.046-15.184-8.582-20.715zm-14.5 80.793c-4.402 4.402-17.941 5.945-41.609-4.196-24.992-10.71-52.887-30.742-78.543-56.398s-45.684-53.547-56.394-78.54c-10.145-23.667-8.602-37.21-4.2-41.612l26.414-26.414 32.625 32.628-15.636 15.641c-7.07 7.07-8.778 17.793-4.243 26.684 20.559 40.312 52.735 72.488 93.047 93.047 8.895 4.535 19.618 2.832 26.688-4.243l15.637-15.636 32.628 32.629zm0 0"/></svg>
            </a>
          </li>
        <?php } ?>

        <?php if ( ! empty( $email ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo esc_url( sprintf( 'mailto:%s', $email ) ); ?>"
               class="mobile-header__social-link"
               aria-label="Email">
              <svg xmlns="http://www.w3.org/2000/svg" class="social-img" viewbox="0 0 31.012 31.012"><path d="M25.109 21.51a.495.495 0 0 1-.342-.136l-5.754-5.398a.5.5 0 1 1 .685-.728l5.754 5.398a.5.5 0 0 1-.343.864zM5.902 21.51a.5.5 0 0 1-.343-.864l5.756-5.398a.5.5 0 0 1 .685.728l-5.756 5.398a.495.495 0 0 1-.342.136z"/><path d="M28.512 26.529H2.5a2.503 2.503 0 0 1-2.5-2.5V6.982c0-1.379 1.122-2.5 2.5-2.5h26.012c1.378 0 2.5 1.121 2.5 2.5v17.047c0 1.379-1.122 2.5-2.5 2.5zM2.5 5.482c-.827 0-1.5.673-1.5 1.5v17.047c0 .827.673 1.5 1.5 1.5h26.012c.827 0 1.5-.673 1.5-1.5V6.982c0-.827-.673-1.5-1.5-1.5H2.5z"/><path d="M15.506 18.018c-.665 0-1.33-.221-1.836-.662L.83 6.155a.501.501 0 0 1-.049-.706.503.503 0 0 1 .706-.048l12.84 11.2c.639.557 1.719.557 2.357 0L29.508 5.419a.5.5 0 0 1 .658.754L17.342 17.355c-.507.442-1.171.663-1.836.663z"/></svg>
            </a>
          </li>
        <?php } ?>

        <?php if ( ! empty( $phone ) ) { ?>
          <li class="mobile-header__social-dropdown-list mobile-header__social-list">
            <a href="<?php echo esc_url( sprintf( 'tel:%s', $phone ) ); ?>"
               class="mobile-header__social-link"
               aria-label="<?php esc_attr_e( 'Phone', 'mst_harvesy' ); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="social-img" viewbox="0 0 473.806 473.806"><path d="M374.456 293.506c-9.7-10.1-21.4-15.5-33.8-15.5-12.3 0-24.1 5.3-34.2 15.4l-31.6 31.5c-2.6-1.4-5.2-2.7-7.7-4-3.6-1.8-7-3.5-9.9-5.3-29.6-18.8-56.5-43.3-82.3-75-12.5-15.8-20.9-29.1-27-42.6 8.2-7.5 15.8-15.3 23.2-22.8 2.8-2.8 5.6-5.7 8.4-8.5 21-21 21-48.2 0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5-6-6.2-12.3-12.6-18.8-18.6-9.7-9.6-21.3-14.7-33.5-14.7s-24 5.1-34 14.7l-.2.2-34 34.3c-12.8 12.8-20.1 28.4-21.7 46.5-2.4 29.2 6.2 56.4 12.8 74.2 16.2 43.7 40.4 84.2 76.5 127.6 43.8 52.3 96.5 93.6 156.7 122.7 23 10.9 53.7 23.8 88 26 2.1.1 4.3.2 6.3.2 23.1 0 42.5-8.3 57.7-24.8.1-.2.3-.3.4-.5 5.2-6.3 11.2-12 17.5-18.1 4.3-4.1 8.7-8.4 13-12.9 9.9-10.3 15.1-22.3 15.1-34.6 0-12.4-5.3-24.3-15.4-34.3l-54.9-55.1zm35.8 105.3c-.1 0-.1.1 0 0-3.9 4.2-7.9 8-12.2 12.2-6.5 6.2-13.1 12.7-19.3 20-10.1 10.8-22 15.9-37.6 15.9-1.5 0-3.1 0-4.6-.1-29.7-1.9-57.3-13.5-78-23.4-56.6-27.4-106.3-66.3-147.6-115.6-34.1-41.1-56.9-79.1-72-119.9-9.3-24.9-12.7-44.3-11.2-62.6 1-11.7 5.5-21.4 13.8-29.7l34.1-34.1c4.9-4.6 10.1-7.1 15.2-7.1 6.3 0 11.4 3.8 14.6 7l.3.3c6.1 5.7 11.9 11.6 18 17.9 3.1 3.2 6.3 6.4 9.5 9.7l27.3 27.3c10.6 10.6 10.6 20.4 0 31-2.9 2.9-5.7 5.8-8.6 8.6-8.4 8.6-16.4 16.6-25.1 24.4-.2.2-.4.3-.5.5-8.6 8.6-7 17-5.2 22.7l.3.9c7.1 17.2 17.1 33.4 32.3 52.7l.1.1c27.6 34 56.7 60.5 88.8 80.8 4.1 2.6 8.3 4.7 12.3 6.7 3.6 1.8 7 3.5 9.9 5.3.4.2.8.5 1.2.7 3.4 1.7 6.6 2.5 9.9 2.5 8.3 0 13.5-5.2 15.2-6.9l34.2-34.2c3.4-3.4 8.8-7.5 15.1-7.5 6.2 0 11.3 3.9 14.4 7.3l.2.2 55.1 55.1c10.3 10.2 10.3 20.7.1 31.3zM256.056 112.706c26.2 4.4 50 16.8 69 35.8s31.3 42.8 35.8 69c1.1 6.6 6.8 11.2 13.3 11.2.8 0 1.5-.1 2.3-.2 7.4-1.2 12.3-8.2 11.1-15.6-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3 3.7-15.6 11s3.5 14.4 10.9 15.6zM473.256 209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2 3.7-15.5 11-1.2 7.4 3.7 14.3 11.1 15.6 46.6 7.9 89.1 30 122.9 63.7 33.8 33.8 55.8 76.3 63.7 122.9 1.1 6.6 6.8 11.2 13.3 11.2.8 0 1.5-.1 2.3-.2 7.3-1.1 12.3-8.1 11-15.4z"/></svg>
            </a>
          </li>
        <?php } ?>
      </ul>
    </li>
  </ul>
</div>
