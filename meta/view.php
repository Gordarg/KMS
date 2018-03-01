<?php
use core\config;
?>
<meta name="author" content="<?= $row['Username'] ?>">
<meta itemprop="description" content="<?= $functionalitiesInstance->makeAbstract($row['Body'], 920) ?>">
<meta property="og:title" content="<?= $row['Title'] ?>">
<meta property="og:description" content="<?= $functionalitiesInstance->makeAbstract($row['Body'], 300) ?>">
<meta property="og:image" content="download.php?id=<?= $row['ID'] ?>">
<meta name="revised" content="<?= config::TITLE ?>, <?= $row['Submit'] ?>" />
<!-- <meta property="fb:admins" content="100001867037114"> -->
<!-- <meta property="og:url" content="[FAST READ URL FOR THIS CONTENT]<?php /* TODO: URL Shorter*/ ?>">	 -->