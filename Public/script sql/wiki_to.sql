-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 05:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki.to`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`) VALUES
('Geography'),
('Health and Wellness'),
('Social Sciences'),
('Technology'),
('Technology and Internet');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`name`) VALUES
('CSS'),
('Health'),
('HTML'),
('Java Script'),
('LARAVEL'),
('PHP'),
('Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp(),
  `role` enum('auteur','admin') NOT NULL DEFAULT 'auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `password`, `added_at`, `role`) VALUES
(89, 'hamid@gmail.com', 'hamid hamid', '$2y$10$IHZHgluZ48DwRimppzOxMOD4m1E8/m3SwpuqOp10xMtx7vby/Qk12', '2024-01-07', 'auteur'),
(93, 'laksoumi.ot@gmail.com', 'Othmane Laksoumi', '$2y$10$MCtPG/iqFHiCFgEXSGrKD.oCj9ShLAsM9HpYcIbRtBmxE7qR2uuPa', '2024-01-10', 'auteur'),
(94, 'admin@admin.com', 'Hassan Sabi', '$2y$10$dRKKDnOw3IHI2Znv.XRIVOHNxtIdFLLXo.NjnX9.Y9i1MYvaZ.YnW', '2024-01-10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wikis`
--

CREATE TABLE `wikis` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `catg_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wikis`
--

INSERT INTO `wikis` (`id`, `auteur_id`, `title`, `contenu`, `img`, `catg_name`, `created_at`, `state`) VALUES
(21, 89, 'Laravel : Un Aperçu Rapide', '<p>Laravel est un framework de d&eacute;veloppement web open-source en PHP, cr&eacute;&eacute; par Taylor Otwell. Lanc&eacute; en 2011, il est devenu populaire pour sa simplicit&eacute; et sa capacit&eacute; &agrave; acc&eacute;l&eacute;rer le d&eacute;veloppement d\'applications web robustes. Laravel propose des fonctionnalit&eacute;s telles qu\'Eloquent ORM pour simplifier l\'interaction avec la base de donn&eacute;es, un syst&egrave;me de routage clair, un moteur de mod&egrave;le Blade, et Artisan Console pour des t&acirc;ches en ligne de commande. Son &eacute;cosyst&egrave;me comprend des outils comme Lumen pour les microservices, Laravel Mix pour la compilation des ressources, Laravel Nova pour l\'administration, Laravel Horizon pour la surveillance des files d\'attente, et Laravel Dusk pour les tests de navigateur. Avec une communaut&eacute; active, Laravel reste un choix populaire pour les d&eacute;veloppeurs cherchant &agrave; construire des applications web modernes et efficaces.</p>', 'public/images/659c46ffdc8c3.jpg', 'Technology and Internet', '2024-01-07 17:25:53', 1),
(22, 89, 'Santé : Un Aperçu Général', '<p>La sant&eacute;, un aspect fondamental de notre existence, englobe une multitude de dimensions. Notre bien-&ecirc;tre physique, mental et social est un &eacute;quilibre d&eacute;licat influenc&eacute; par divers facteurs. Adopter un mode de vie sain, incluant une alimentation &eacute;quilibr&eacute;e et une activit&eacute; physique r&eacute;guli&egrave;re, contribue &agrave; maintenir notre sant&eacute; physique. Sur le plan mental, la gestion du stress, la recherche de l\'&eacute;quilibre &eacute;motionnel et le soutien social sont des &eacute;l&eacute;ments cl&eacute;s. Notre sant&eacute; sociale est nourrie par nos interactions avec la communaut&eacute; et nos relations interpersonnelles. Un environnement propre et s&ucirc;r est &eacute;galement essentiel pour pr&eacute;server notre sant&eacute; environnementale. La g&eacute;n&eacute;tique joue un r&ocirc;le dans notre sant&eacute;, avec des pr&eacute;dispositions g&eacute;n&eacute;tiques influen&ccedil;ant parfois nos conditions de sant&eacute;. Les soins m&eacute;dicaux, allant de la pr&eacute;vention &agrave; la gestion des maladies, sont des piliers essentiels de notre bien-&ecirc;tre. Les avanc&eacute;es dans la m&eacute;decine, notamment la g&eacute;nomique et la m&eacute;decine personnalis&eacute;e, ouvrent de nouvelles perspectives pour des traitements plus cibl&eacute;s. Cependant, des d&eacute;fis persistent, notamment la pr&eacute;valence croissante de maladies chroniques et la n&eacute;cessit&eacute; d\'adopter des approches plus holistiques dans les soins de sant&eacute;. La technologie de la sant&eacute;, avec ses innovations constantes, offre &eacute;galement des solutions prometteuses pour am&eacute;liorer la pr&eacute;vention, le diagnostic et le traitement des maladies. En somme, la sant&eacute; est un domaine dynamique et multidimensionnel, o&ugrave; la pr&eacute;vention, les soins m&eacute;dicaux et les innovations technologiques se conjuguent pour soutenir notre qu&ecirc;te d\'une vie &eacute;panouissante.</p>', 'public/images/659c82b7e80da.jpg', 'Health and Wellness', '2024-01-10 20:13:47', 1),
(23, 93, 'Évolution Technologique : Au-delà des Limites et des Défis', 'La technologie a connu une évolution significative tout au long du 20e siècle. Des premiers ordinateurs aux avancées actuelles telles que l&#039;intelligence artificielle, son impact sur la société est indéniable. Aujourd&#039;hui, nous vivons à l&#039;ère des smartphones et de l&#039;Internet omniprésent, changeant la façon dont nous interagissons, travaillons et nous divertissons.\r\n\r\nCette rapide progression technologique soulève des questions éthiques et des défis. La confidentialité des données, l&#039;équité dans l&#039;accès à la technologie et les implications de l&#039;intelligence artificielle suscitent des débats continus.\r\n\r\nLa technologie continue d&#039;évoluer, avec des développements tels que la réalité virtuelle, la biotechnologie et la blockchain. Ces avancées offrent de nouvelles perspectives, tout en présentant également des défis inédits.\r\n\r\nLes prochaines décennies promettent des changements encore plus profonds. Alors que la technologie façonne notre avenir, la société doit aborder ces avancées avec un regard critique pour garantir un impact positif. Les discussions sur la régulation, l&#039;éthique et la durabilité resteront au cœur de ces développements.', 'public/images/659c60b2db3eb.jpg', 'Technology and Internet', '2024-01-10 20:13:52', 1),
(25, 89, 'Le Monde Connecté : Les Avancées Technologiques Redéfinissent Notre Quotidien', '<p>L\'&eacute;volution rapide de la technologie a transform&eacute; radicalement notre mode de vie, affectant chaque aspect de notre quotidien. Des smartphones aux voitures autonomes, en passant par l\'intelligence artificielle, la technologie a fa&ccedil;onn&eacute; un monde connect&eacute; et innovant. Un domaine qui a connu une croissance exponentielle est celui des smartphones. Ces petits appareils ont &eacute;volu&eacute; au-del&agrave; de simples outils de communication pour devenir de v&eacute;ritables centres de commande pour nos vies. Des appareils photo haute r&eacute;solution aux applications de sant&eacute;, les smartphones ont red&eacute;fini la fa&ccedil;on dont nous interagissons avec le monde qui nous entoure. L\'intelligence artificielle (IA) a &eacute;galement jou&eacute; un r&ocirc;le crucial dans la r&eacute;volution technologique. Des algorithmes sophistiqu&eacute;s alimentent des syst&egrave;mes d\'IA qui apprennent et s\'adaptent, am&eacute;liorant constamment leurs performances. Ces avanc&eacute;es ont des implications dans divers secteurs, de la m&eacute;decine &agrave; la finance, en passant par l\'&eacute;ducation. Un autre aspect passionnant de la technologie est le d&eacute;veloppement des voitures autonomes. Les v&eacute;hicules autonomes promettent de rendre nos d&eacute;placements plus s&ucirc;rs et plus efficaces. Avec des capteurs avanc&eacute;s et des syst&egrave;mes de navigation intelligents, ces voitures sont con&ccedil;ues pour minimiser les accidents et r&eacute;duire les embouteillages. La r&eacute;alit&eacute; virtuelle (VR) et la r&eacute;alit&eacute; augment&eacute;e (AR) ont &eacute;galement ouvert de nouvelles perspectives passionnantes. Les applications de ces technologies vont au-del&agrave; du simple divertissement, s\'&eacute;tendant &agrave; des domaines tels que la formation professionnelle, la m&eacute;decine et l\'architecture. La possibilit&eacute; d\'immerger les utilisateurs dans des environnements virtuels a un potentiel r&eacute;volutionnaire. Le d&eacute;veloppement de l\'Internet des objets (IoT) a cr&eacute;&eacute; un r&eacute;seau interconnect&eacute; d\'appareils, permettant une communication transparente entre eux. Des maisons intelligentes aux villes intelligentes, l\'IoT a le pouvoir d\'optimiser l\'efficacit&eacute; &eacute;nerg&eacute;tique et d\'am&eacute;liorer notre qualit&eacute; de vie. Cependant, avec toutes ces avanc&eacute;es technologiques, des questions &eacute;thiques et de s&eacute;curit&eacute; &eacute;mergent &eacute;galement. La protection de la vie priv&eacute;e, la s&eacute;curit&eacute; des donn&eacute;es et l\'&eacute;thique dans l\'utilisation de l\'IA sont des pr&eacute;occupations croissantes qui n&eacute;cessitent une attention particuli&egrave;re. En conclusion, la technologie continue de red&eacute;finir notre monde de mani&egrave;re passionnante et parfois complexe. Alors que nous c&eacute;l&eacute;brons les progr&egrave;s qui am&eacute;liorent nos vies, il est essentiel de rester conscients des d&eacute;fis &eacute;thiques et de s&eacute;curit&eacute; associ&eacute;s &agrave; cette r&eacute;volution technologique. En trouvant un &eacute;quilibre entre l\'innovation et la responsabilit&eacute;, nous pouvons fa&ccedil;onner un avenir o&ugrave; la technologie enrichit v&eacute;ritablement notre existence.</p>', 'public/images/659db774943bb.jpg', 'Technology and Internet', '2024-01-08 20:17:29', 1),
(26, 89, 'JavaScript et ses Frameworks : Une Odyssée dans le Monde du Développement Web', '<p>Depuis son apparition dans les ann&eacute;es 90, JavaScript s\'est impos&eacute; comme le langage de programmation incontournable pour le d&eacute;veloppement web. Il a &eacute;volu&eacute; au fil des ann&eacute;es, devenant un acteur majeur dans la cr&eacute;ation d\'exp&eacute;riences interactives et dynamiques sur le Web. JavaScript, souvent abr&eacute;g&eacute; JS, est un langage de programmation de haut niveau, interpr&eacute;t&eacute;, et orient&eacute; objet. Sa polyvalence en fait un choix privil&eacute;gi&eacute; pour les d&eacute;veloppeurs souhaitant cr&eacute;er des fonctionnalit&eacute;s interactives sur les sites web. Il peut &ecirc;tre utilis&eacute; c&ocirc;t&eacute; client, c&ocirc;t&eacute; serveur, voire m&ecirc;me dans le d&eacute;veloppement d\'applications mobiles. L\'un des atouts majeurs de JavaScript r&eacute;side dans son &eacute;cosyst&egrave;me de frameworks robustes, qui simplifient le processus de d&eacute;veloppement et permettent de cr&eacute;er des applications web modernes et performantes. L\'un des frameworks les plus populaires est Angular, d&eacute;velopp&eacute; par Google. Angular offre une structure solide pour le d&eacute;veloppement d\'applications web, avec une architecture bas&eacute;e sur des composants r&eacute;utilisables. Il int&egrave;gre &eacute;galement des fonctionnalit&eacute;s avanc&eacute;es telles que la gestion de l\'&eacute;tat global de l\'application et une liaison de donn&eacute;es bidirectionnelle. React, cr&eacute;&eacute; par Facebook, est un autre framework majeur. Connu pour sa simplicit&eacute; et sa flexibilit&eacute;, React se concentre sur la construction d\'interfaces utilisateur r&eacute;actives. Sa structure bas&eacute;e sur des composants permet une gestion efficace de l\'interface, favorisant ainsi le d&eacute;veloppement d\'applications &eacute;volutives. Vue.js, un framework plus r&eacute;cent mais en constante croissance, se distingue par sa simplicit&eacute; d\'int&eacute;gration et sa courbe d\'apprentissage douce. Il offre une approche progressive pour le d&eacute;veloppement d\'interfaces utilisateur, permettant aux d&eacute;veloppeurs de l\'adopter progressivement dans leurs projets. Le d&eacute;veloppement de JavaScript ne se limite pas aux frameworks front-end. Node.js, bas&eacute; sur le moteur JavaScript V8 de Google, permet d\'ex&eacute;cuter du code JavaScript c&ocirc;t&eacute; serveur. Cela ouvre la porte &agrave; des applications JavaScript compl&egrave;tes, de la base de donn&eacute;es au front-end, utilisant un seul langage pour l\'ensemble du d&eacute;veloppement. Cependant, avec la diversit&eacute; des frameworks JavaScript, le choix peut parfois &ecirc;tre d&eacute;licat. Il est essentiel de consid&eacute;rer les besoins sp&eacute;cifiques du projet, la communaut&eacute; de chaque framework, ainsi que la maintenance &agrave; long terme. En conclusion, JavaScript et ses frameworks ont r&eacute;volutionn&eacute; le paysage du d&eacute;veloppement web. De Angular &agrave; React, en passant par Vue.js, chaque framework offre des avantages uniques. Le choix du framework d&eacute;pendra des objectifs du projet et des pr&eacute;f&eacute;rences du d&eacute;veloppeur. En embrassant la polyvalence de JavaScript et en ma&icirc;trisant les frameworks appropri&eacute;s, les d&eacute;veloppeurs peuvent cr&eacute;er des exp&eacute;riences web modernes et dynamiques. La route du d&eacute;veloppement web continue d\'&eacute;voluer, avec JavaScript comme compagnon fid&egrave;le dans cette odyss&eacute;e technologique.</p>', 'public/images/659db88341d3f.png', 'Technology and Internet', '2024-01-10 17:25:59', 1),
(30, 93, 'Affiliate Marketing 101: How to Write Good Content', '<p>Affiliate marketing is a great way to make passive income online, and it can be your biggest earner if you&rsquo;re a blogger. By 2020, it is expected to have attained an annual growth rate of&nbsp;<a href=\"https://www.entrepreneur.com/article/326249\" rel=\"noreferrer noopener\">10 percent</a>.</p>\r\n<p>&nbsp;</p>\r\n<p>However, mastering the art of creating great content is part of affiliate marketing 101: it&rsquo;s not just about reviewing a product or including links in your content.</p>\r\n<p>Read on to learn everything about building good content for affiliate marketing.</p>\r\n<p>&nbsp;</p>\r\n<h2>Types of Content for Affiliate Marketing</h2>\r\n<p>First, you&rsquo;ll need to be creative about the ways you serve up your affiliate links. If you keep doing the same thing, your readers will get bored and move on.</p>\r\n<p>Create meaningful and engaging posts, allowing your readers to relate with the products. Most people are put off by in-your-face advertising. There are six kinds of content you can create:</p>\r\n<h3>1. Seasonal Blog Posts</h3>\r\n<p>Seasonal blog posts can be time-based or event-based. Time-based posts target the four seasons while event-based posts target holidays e.g. Christmas, Easter, Halloween, etc. Other kinds of events depend on your niche.</p>\r\n<h3>2. Evergreen Blog Posts</h3>\r\n<p>This is content that doesn&rsquo;t go out of date &ndash; it is based on facts and features information the target audience understands and needs perpetually</p>\r\n<h3>3. Roundup Posts</h3>\r\n<p>Roundups compile lists of the best products for different types of clientele. Such posts allow you to naturally add lots of affiliate links, increasing your earning potential.</p>\r\n<h3>4. Mini-Courses</h3>\r\n<p>Email courses offer content that adds value to your target audience. A series of auto-generated emails delivers lessons to subscribers&rsquo; inboxes over several weeks. This information is related to your target products and services</p>\r\n<h3>5. &ldquo;Best of&rdquo; Posts</h3>\r\n<p>These are summaries of posts in your blog, usually published at the end of a year or quarter depending on your audience. You can use these to redirect readers to old articles or bring back useful information you had already given in the past.</p>\r\n<h3>6. Product Reviews</h3>\r\n<p>Product reviews are always searched for. Be sure to create honest, concise and tailored reviews. To extend your posts, you may choose to do comparison reviews of items users are likely to be conflicted about. Creating an infographic that summarizes important details will have your customers lingering on your page a bit longer.</p>\r\n<h2>Basic Steps to Building Good Content</h2>\r\n<p>Regardless of the type of content you wish to publish, you need to establish the basic steps to rope in your audience. Taking&nbsp;<a href=\"https://residualincomesecrets.com/the-best-affiliate-marketing-programs-for-beginners/\" rel=\"noreferrer noopener\">affiliate marketing programs for beginners</a>&nbsp;can help you learn some of the secretes seasoned affiliate marketers use.</p>\r\n<h3>1. Choose Your Niche</h3>\r\n<p>It&rsquo;s much easier to become an affiliate marketer if you&rsquo;re blogging already; because then you have a niche. Within this niche, you already like and use very many products. So all you need to do is publicize them and why you like them.</p>\r\n<h3>2. Choose a Product</h3>\r\n<p>Start with any product: do you like books: review some books. Do you like cooking? Review things you can&rsquo;t do without in your kitchen.</p>\r\n<p>Comparison reviews can work great, and if you look it up, you&rsquo;ll find lots of content covering brand comparisons.</p>\r\n<p>The thing with affiliate marketing is to remember that your biggest client is your readers, not the merchants paying your commission. Therefore, you need to actually help your readers with your links. If your information/reviews aren&rsquo;t genuinely helpful, you lose credibility with your readers.</p>\r\n<h3>3. Leverage Visuals</h3>\r\n<p>Images, infographics, and videos can help you relay important information about products and services in certain niches. They are also great for breaking down long content or emphasizing a point.</p>\r\n<p>However, remember to only add images or video if they add value to your overall message. Remember that they can be heavy/cause your page to load a little slower. However, used properly, they are great for increasing engagement with your audience.</p>\r\n<p>Live feeds and webinars are also great for gadgets and appliances. Seeing you use certain products brings them to life in a way words never could. You can use your blog and social media to&nbsp;<a href=\"https://www.searchenginejournal.com/webinar-planning-best-practices-guide/231301/\" rel=\"noreferrer noopener\">promote your webinar</a>&nbsp;and even send it to your email subscribers.</p>\r\n<h3>4. Create an Email List</h3>\r\n<p>Building an email list can help you serve future content to interested subscribers with ease.</p>\r\n<p>If you&rsquo;re blogging, you probably have a way for users to subscribe to your site. Free offerings like e-books, webinars and white papers are great ways to grow your mailing list. You can send your best-of posts, roundups, and mini-courses to emails, as well as other tailored content, for subscribers to act on.</p>\r\n<p>Because you chose your niche and products, subscribers are highly targeted, so you don&rsquo;t need thousands to make your efforts worthwhile.</p>\r\n<p>Ideally, send weekly content to keep them engaged with your blog/products. Every so often, include calls-to-action to buy certain products.</p>\r\n<p>If you change your mind or find new products that you like better, you can update your audience and also tell them why they should make the switch.</p>\r\n<h2>Tips to Improve Engagement and Offer Value</h2>\r\n<p>Creating content that appeals to your audience is important. Here are tips you can use:</p>\r\n<h3>1. Be Truthful</h3>\r\n<p>However, you choose to present your affiliate links, ensure that you&rsquo;re being honest with your readers. If you&rsquo;re reviewing a product that many other people have liked but you haven&rsquo;t, say it. If you can, talk about products and services you have used yourself &ndash; these are so many &ndash; and not just those that will bring you more sales.</p>\r\n<p>It&rsquo;s very hard to create engaging content for products you haven&rsquo;t tried. Your audience trusts you, and they&rsquo;ll see through any feeble attempt to pitch products you haven&rsquo;t tried.</p>\r\n<p>It helps, sometimes, to mention that you may earn a commission through some of the products you&rsquo;re talking about. You won&rsquo;t lose your audience; if anything, most readers will love this forthrightness.</p>\r\n<h3>2. Personalize Your Products</h3>\r\n<p>Explain why certain products resonate with you in a special way &ndash; how you personally benefitted instead of just the features available everywhere.</p>\r\n<p>Why do you love it? What&rsquo;s so special about it for you?</p>\r\n<p>You can even tell a story about your journey to finding it and using it. Don&rsquo;t forget your readers, and how they might benefit from it or why they should invest in it.</p>\r\n<p>Anyone can write a review anywhere &ndash; How you present your marketing content can have a lifelong impact on the value readers attach to your opinion. And your opinion means everything in affiliate marketing.</p>\r\n<h3>3. Tell Your Stories Naturally</h3>\r\n<p>Finally, the best way to do affiliate marketing is to never make it feel like affiliate marketing. Try to incorporate your product mentions and links into your natural blog stories.</p>\r\n<p>Your recommendations should sound like they&rsquo;re coming from a friend to a friend. This will make your content more exciting and&nbsp;<a href=\"https://www.inc.com/heather-r-morgan/5-writing-tricks-that-will-help-you-appeal-to-short-attention-spans.html\" rel=\"noreferrer noopener\">appealing for your readers</a>.</p>\r\n<p>Also, remember to just offer the good non-marketing content your audience came to you for. Don&rsquo;t make them feel like you&rsquo;ve turned into a shop, out to make money off them.</p>\r\n<h2>Affiliate Marketing 101 &ndash; Conclusion</h2>\r\n<p>Well, there you have it, everything on Affiliate Marketing 101. You have learned the best ways to leverage your readership to make some passive income.</p>\r\n<p>In conclusion, it helps to mention that affiliate marketing is a long game: you won&rsquo;t see thousands in your bank account overnight. Too much too soon can actually be counter-productive.</p>\r\n<p>Instead, focus on what you want over the longer term, and work on giving your readers value on your way there.</p>\r\n<p>If you loved the post, feel free to share on social media.</p>', 'public/images/659fd1a52487e.png', 'Technology and Internet', '2024-01-11 11:26:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_tags`
--

CREATE TABLE `wiki_tags` (
  `wiki_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiki_tags`
--

INSERT INTO `wiki_tags` (`wiki_id`, `tag_name`) VALUES
(21, 'LARAVEL'),
(21, 'PHP'),
(22, 'Health'),
(25, 'Technology'),
(26, 'CSS'),
(26, 'HTML'),
(26, 'Java Script'),
(30, 'Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wikis_ctgfk` (`catg_name`),
  ADD KEY `wikis_auteurfk` (`auteur_id`);

--
-- Indexes for table `wiki_tags`
--
ALTER TABLE `wiki_tags`
  ADD PRIMARY KEY (`wiki_id`,`tag_name`),
  ADD KEY `tags_name_fk` (`tag_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `wikis_auteurfk` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikis_ctgfk` FOREIGN KEY (`catg_name`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wiki_tags`
--
ALTER TABLE `wiki_tags`
  ADD CONSTRAINT `tags_name_fk` FOREIGN KEY (`tag_name`) REFERENCES `tags` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_id_fk` FOREIGN KEY (`wiki_id`) REFERENCES `wikis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
