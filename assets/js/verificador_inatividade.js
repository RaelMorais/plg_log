// Define um tempo limite de inatividade (em milissegundos)
const inactivityTimeout = 900000; // 15 minutos

// Função para reiniciar o tempo limite de inatividade
const resetInactivityTimer = () => {
  clearTimeout(window.inactivityTimer);
  window.inactivityTimer = setTimeout(logoutUser, inactivityTimeout);
};

// Função para realizar o logout do usuário
const logoutUser = () => {
  // Redirecione o usuário para a página de logout ou execute alguma ação de logout
  window.location.href = '/logout.php';
};

// Função para realizar uma solicitação AJAX para atualizar a última atividade da sessão no servidor
const updateSessionActivity = () => {
  fetch('/inc/verificador_atividade/update_session_activity.php', {
    method: 'POST',
    credentials: 'include', // Inclui cookies na solicitação, se aplicável
  });
};

// Adicione eventos de atividade do usuário para reiniciar o temporizador de inatividade e atualizar a atividade da sessão no servidor
['mousemove', 'keydown'].forEach(eventType => {
  document.addEventListener(eventType, () => {
    resetInactivityTimer();
    updateSessionActivity();
  });
});

// Inicialize o temporizador de inatividade
resetInactivityTimer();

