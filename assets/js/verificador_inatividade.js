// Define um tempo limite de inatividade (em milissegundos)
const inactivityTimeout = 900000; // 15 minutos

const resetInactivityTimer = () => {
  clearTimeout(window.inactivityTimer);
  window.inactivityTimer = setTimeout(logoutUser, inactivityTimeout);
};

const logoutUser = () => {
  window.location.href = '/src/login.php';
};

const updateSessionActivity = () => {
  fetch('/inc/verificador_atividade/update_session_activity.php', {
    method: 'POST',
    credentials: 'include',
  });
};

['mousemove', 'keydown'].forEach(eventType => {
  document.addEventListener(eventType, () => {
    resetInactivityTimer();
    updateSessionActivity();
  });
});

resetInactivityTimer();