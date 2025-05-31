<div>
  <?php if ($role === 'admin'): ?>
   <h2>Bienvenue, <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

<?php elseif ($role === 'Agent Immobilier'): ?>
  <h2>Bonjour, <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

<?php elseif ($role === 'client'): ?>
  <h2>Bonjour <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

<?php else: ?>
  <h2>Bienvenue sur notre site !</h2>
  <p>Veuillez vous connecter pour accéder à votre espace personnalisé.</p>
<?php endif; ?>
</div>
