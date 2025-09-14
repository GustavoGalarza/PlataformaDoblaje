<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RedesSociale;

class RedesSocialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $redes = [
            ['nombre' => 'Facebook', 'descripcion' => 'Red social general', 'icono' => 'fa-brands fa-facebook'],
            ['nombre' => 'Facebook F', 'descripcion' => 'Red social general', 'icono' => 'fa-brands fa-facebook-f'],
            ['nombre' => 'Twitter', 'descripcion' => 'Red social de microblogging', 'icono' => 'fa-brands fa-twitter'],
            ['nombre' => 'Instagram', 'descripcion' => 'Red social de fotos y videos', 'icono' => 'fa-brands fa-instagram'],
            ['nombre' => 'LinkedIn', 'descripcion' => 'Red profesional', 'icono' => 'fa-brands fa-linkedin'],
            ['nombre' => 'LinkedIn In', 'descripcion' => 'Red profesional', 'icono' => 'fa-brands fa-linkedin-in'],
            ['nombre' => 'YouTube', 'descripcion' => 'Plataforma de videos', 'icono' => 'fa-brands fa-youtube'],
            ['nombre' => 'YouTube Square', 'descripcion' => 'Plataforma de videos', 'icono' => 'fa-brands fa-youtube-square'],
            ['nombre' => 'TikTok', 'descripcion' => 'Red social de videos cortos', 'icono' => 'fa-brands fa-tiktok'],
            ['nombre' => 'Pinterest', 'descripcion' => 'Red social de descubrimiento visual', 'icono' => 'fa-brands fa-pinterest'],
            ['nombre' => 'Pinterest P', 'descripcion' => 'Red social de descubrimiento visual', 'icono' => 'fa-brands fa-pinterest-p'],
            ['nombre' => 'Snapchat', 'descripcion' => 'Mensajería efímera', 'icono' => 'fa-brands fa-snapchat'],
            ['nombre' => 'Snapchat Ghost', 'descripcion' => 'Mensajería efímera', 'icono' => 'fa-brands fa-snapchat-ghost'],
            ['nombre' => 'Reddit', 'descripcion' => 'Foros y comunidades', 'icono' => 'fa-brands fa-reddit'],
            ['nombre' => 'Reddit Alien', 'descripcion' => 'Foros y comunidades', 'icono' => 'fa-brands fa-reddit-alien'],
            ['nombre' => 'WhatsApp', 'descripcion' => 'Mensajería instantánea', 'icono' => 'fa-brands fa-whatsapp'],
            ['nombre' => 'Telegram', 'descripcion' => 'Mensajería segura', 'icono' => 'fa-brands fa-telegram'],
            ['nombre' => 'Tumblr', 'descripcion' => 'Blogs y microblogging', 'icono' => 'fa-brands fa-tumblr'],
            ['nombre' => 'GitHub', 'descripcion' => 'Repositorio de software', 'icono' => 'fa-brands fa-github'],
            ['nombre' => 'GitHub Square', 'descripcion' => 'Repositorio de software', 'icono' => 'fa-brands fa-github-square'],
            ['nombre' => 'GitLab', 'descripcion' => 'Repositorio de software', 'icono' => 'fa-brands fa-gitlab'],
            ['nombre' => 'Stack Overflow', 'descripcion' => 'Comunidad de programadores', 'icono' => 'fa-brands fa-stack-overflow'],
            ['nombre' => 'Dribbble', 'descripcion' => 'Portafolios de diseño', 'icono' => 'fa-brands fa-dribbble'],
            ['nombre' => 'Behance', 'descripcion' => 'Portafolios de diseño', 'icono' => 'fa-brands fa-behance'],
            ['nombre' => 'Medium', 'descripcion' => 'Plataforma de artículos', 'icono' => 'fa-brands fa-medium'],
            ['nombre' => 'Slack', 'descripcion' => 'Comunicación de equipos', 'icono' => 'fa-brands fa-slack'],
            ['nombre' => 'Discord', 'descripcion' => 'Chat para comunidades', 'icono' => 'fa-brands fa-discord'],
            ['nombre' => 'Twitch', 'descripcion' => 'Streaming de videojuegos', 'icono' => 'fa-brands fa-twitch'],
            ['nombre' => 'Vimeo', 'descripcion' => 'Plataforma de video profesional', 'icono' => 'fa-brands fa-vimeo'],
            ['nombre' => 'Vimeo V', 'descripcion' => 'Plataforma de video profesional', 'icono' => 'fa-brands fa-vimeo-v'],
            ['nombre' => 'SoundCloud', 'descripcion' => 'Plataforma de audio', 'icono' => 'fa-brands fa-soundcloud'],
            ['nombre' => 'Spotify', 'descripcion' => 'Plataforma de música', 'icono' => 'fa-brands fa-spotify'],
            ['nombre' => 'WhatsApp Square', 'descripcion' => 'Mensajería instantánea', 'icono' => 'fa-brands fa-whatsapp-square'],
            ['nombre' => 'Xing', 'descripcion' => 'Red profesional', 'icono' => 'fa-brands fa-xing'],
            ['nombre' => 'Hacker News', 'descripcion' => 'Noticias de tecnología', 'icono' => 'fa-brands fa-hacker-news'],
            ['nombre' => 'Stack Exchange', 'descripcion' => 'Foros de conocimiento', 'icono' => 'fa-brands fa-stack-exchange'],
            ['nombre' => 'Weibo', 'descripcion' => 'Red social china', 'icono' => 'fa-brands fa-weibo'],
            ['nombre' => 'QQ', 'descripcion' => 'Red social china', 'icono' => 'fa-brands fa-qq'],
            ['nombre' => 'VK', 'descripcion' => 'Red social rusa', 'icono' => 'fa-brands fa-vk'],
            ['nombre' => 'Yahoo', 'descripcion' => 'Portal y correo', 'icono' => 'fa-brands fa-yahoo'],
            ['nombre' => 'Steam', 'descripcion' => 'Plataforma de videojuegos', 'icono' => 'fa-brands fa-steam'],
            ['nombre' => 'Steam Square', 'descripcion' => 'Plataforma de videojuegos', 'icono' => 'fa-brands fa-steam-square'],
            ['nombre' => 'Reddit Square', 'descripcion' => 'Foros y comunidades', 'icono' => 'fa-brands fa-reddit-square'],
            ['nombre' => 'Facebook Messenger', 'descripcion' => 'Mensajería de Facebook', 'icono' => 'fa-brands fa-facebook-messenger'],
        ];

        foreach ($redes as $red) {
            RedesSociale::create($red);
        }
    }
}
