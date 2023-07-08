
------------------------------------------------------------------
"Lorsqu'une recette est ajoutée, elle sera ajoutée à la base de données, mais si elle ne contient pas d'image, 
elle ne sera pas affichée dans les pages utilisateur. Si vous supprimez l'image d'une recette existante, 
celle-ci ne sera plus visible dans les pages utilisateur."
---------------------------------------------------------------------------
Lors de l'ajout d'une recette, l'administrateur peut fournir le nombre de calories 
facultativement, mais ce dernier n'est pas utilisé pour la classification de la recette. 
Pour classer la recette, on parcoure la liste des ingrédients et on calcule la somme des calories des ingrédients 
puis on compare la somme a  un seuil fixé 
à 700 calories (code/user/view/healthy.php :la 3 eme ligne la methode HealthyRecette)
  dans cette version du code source.
---------------------------------------------------------------------------
pour la classification du receete selon la saison :
"Pour classer une recette selon la saison, on parcoure les ingrédients de cette
 recette et on calcule le nombre d'apparition de chaque ingrédient dans chaque saison.
 Ensuite, on classe la recette dans la saison où le nombre d'apparition de l'ingrédient de cette recette
 est le plus élevé."
--------------------------
il faut garder le nom code du repartoire pere car dans le projet ' il existe des chemins absolus



