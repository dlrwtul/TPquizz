<h1>Tableaux des joueurs</h1>
    <div class="tableau">
        <table>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Score</th>
            </tr>
            <?php 
                $array = find_data("users");
                foreach ($array as $value) {
                if ($value['role'] == "JOUEUR") {
                    echo "<tr>";
                    echo "<td>".$value['prenom']."</td>";
                    echo "<td>".$value['nom']."</td>";
                    echo "<td>".$value['score']." pts"."</td>";
                    echo "</tr>";
                }
                }

            ?>

        </table>
    </div>
<div class="suivant"><span id="suivantliste"><button>Suivant</button></span></div>