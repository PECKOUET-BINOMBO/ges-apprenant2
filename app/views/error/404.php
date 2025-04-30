
<div class="container">
    <img src="/assets/images/logo.png" alt="Logo Sonatel">
    <h1>404</h1>
    <p>Oups... La page que vous cherchez semble introuvable.</p>
    <a href="?route=dashboard" class="btn">Retour au tableau de bord</a>
  </div>

  <style>



.container {
  text-align: center;
  animation: fadeIn 1.5s ease;
}

.container img {
  width: 150px;
  margin-bottom: 20px;
  animation: float 3s ease-in-out infinite;
}

.container h1 {
  font-size: 100px;
  margin: 0;
  color: #ff6600;
  animation: pop 0.8s ease-out;
}

.container p {
  font-size: 20px;
  color: #333;
  margin: 10px 0 20px;
}

.btn {
  background-color: #ff6600;
  color: white;
  padding: 12px 24px;
  border-radius: 5px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #e65c00;
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

@keyframes pop {
  0% { transform: scale(0.8); opacity: 0; }
  100% { transform: scale(1); opacity: 1; }
}

  </style>