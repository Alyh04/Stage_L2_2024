<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique</title>
    <link rel="icon" href="../administrateur/image/fait.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="header__promotion">
            <p class="header__promotion-text">Gestion de Ticket</p>
        </div>
        <nav class="header__nav">
            <img src="icon/bonjour.png" alt="Bienvenue">
            <a class="header__logo" href="#">Bienvenue</a>
            <div class="header__links-container">
                <img src="icon/actualisation.png" alt="actualisation">
                <a class="header__link" href="#">Vider la table</a>
            </div>
            <div class="header__links-container">
                <img src="icon/deconnexion.png" alt="icon">
                <a class="header__link" href="#">Se deconnecter</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="content-section">
            <h1 class="content-section__title">Historique des tickets</h1>
            <div class="container"> 
                <div class="course-box">
                    <div class="course"></div>
                    <div class="box">
                        <div class="ticket-container" id="ticketsBody">
                            <?php
                            $host = 'localhost';
                            $dbname = 'gestion_de_ticket';
                            $user = 'root';
                            $pass = '';

                            try {
                                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sql = "SELECT * FROM ticket ";
                                $stmt = $pdo->query($sql);

                                $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($tickets as $ticket) {
                                    echo '<div class="ticket">';
                                    echo '<h2>' . $ticket['id_ticket'] . '</h2>';
                                    echo '<p>'  . $ticket['description'] . '</p>';
                                    echo '<p>' ."Date de Creation : " . $ticket['date_creation'] . '</p>';
                                    echo '<p>' ."Date de résolution : " . $ticket['date_resolution'] . '</p>';
                                    echo '</div>';
                                }

                            } catch (PDOException $e) {
                                echo "Erreur de connexion : " . $e->getMessage();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <script>
        function loadTickets() {
            fetch('affichage.php')
                .then(response => response.json())
                .then(tickets => {
                    const ticketsBody = document.getElementById('ticketsBody');
                    ticketsBody.innerHTML = ''; // Efface le contenu existant

                    tickets.forEach(ticket => {
                        const ticketDiv = document.createElement('div');
                        ticketDiv.classList.add('ticket');
                        ticketDiv.innerHTML = `
                            <h2>${ticket.id_ticket}</h2>
                            <p>${ticket.description}</p>
                            <p>Date de Création : ${ticket.date_creation}</p>
                            <p>Date de Résolution : ${ticket.date_resolution}</p>
                        `;
                        ticketsBody.appendChild(ticketDiv);
                    });
                })
                .catch(error => console.error('Erreur lors du chargement des tickets :', error));
        }

        // Chargement initial des tickets
        loadTickets();

        // Rafraîchir les tickets toutes les 0,2 secondes (200 ms)
        setInterval(loadTickets, 200);
    </script>

    <script src="js/script.js"></script>
</body>
</html>
