<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Notification de réponse à un sujet - <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>


Bonjour <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Vous recevez cette notification car vous surveillez le sujet, « <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?> » sur « <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> ». Depuis votre dernière visite, ce sujet a reçu une réponse<?php if ($this->_rootref['AUTHOR_NAME'] !== ('')) {  ?> de <?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; } ?>. Aucune autre notification ne vous sera envoyée jusqu’à votre prochaine visite sur le sujet.

Pour voir les nouvelles réponses, cliquez sur le lien suivant:
<?php echo (isset($this->_rootref['U_NEWEST_POST'])) ? $this->_rootref['U_NEWEST_POST'] : ''; ?>


Pour voir le sujet dans son ensemble, cliquez sur le lien suivant:
<?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?>


Pour visiter le forum, cliquez sur le lien suivant:
<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Si vous ne voulez plus surveiller ce sujet, vous pouvez soit cliquer sur le lien « Arrêter de surveiller ce sujet » en bas du sujet ci-dessus, soit cliquer sur le lien suivant:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_TOPIC'])) ? $this->_rootref['U_STOP_WATCHING_TOPIC'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>