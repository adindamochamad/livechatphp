$(document).ready(function () {
  $(".chatHeader").click(function () {
    $(".chatArea").toggle();
  });

  $("#start").click(function (e) {
    e.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();

    if (name == "" || email == "") {
      alert("Kolom Wajib Diisi!");
    } else {
      $.ajax({
        url: "registerUser.php",
        method: "POST",
        data: $("#formregister").serialize(),
        success: function (data) {
          $("#user").html("");
          $("#formregister").fadeOut("fast");
          $(".chat").fadeIn();
          $("#user").append(data);
          loadUser();
        },
      });
    }
  });

  $("#send").click(function (e) {
    e.preventDefault();
    var message = $("#message").val();

    if (message == "") {
      alert("Message Wajib Diisi");
    } else {
      $.ajax({
        url: "insertChat.php",
        method: "POST",
        data: $("#chatFrom").serialize(),
        success: function (data) {
          $("#chatFrom")[0].reset();
          loadChat();
          loadChatADMIN();
        },
      });
    }
  });

  function loadUser() {
    $.ajax({
      url: "loadUser.php",
      method: "GET",
      data: "html",
      success: function (data) {
        $("#user").append(data);
      },
    });
  }
  loadUser();

  function loadChat() {
    $.ajax({
      url: "loadChat.php",
      method: "GET",
      data: "html",
      success: function (data) {
        loadUser();
        $("#loadChat").html(data);
        scrollToBottomUser();
      },
    });
  }
  loadChat();
  // setInterval(function () {
  //   loadChat();
  // }, 1000);

  function loadChatADMIN() {
    $.ajax({
      url: "loadChatADMIN.php",
      method: "GET",
      data: "html",
      success: function (data) {
        loadUser();
        $("#loadChatADMIN").html(data);
        scrollToBottomAdmin();
      },
    });
  }
  loadChatADMIN();
  // setInterval(function () {
  //   loadChatADMIN();
  // }, 1000);

  function scrollToBottomAdmin() {
    var chatContainer = $("#chatAdmin");
    chatContainer.animate({ scrollTop: chatContainer[0].scrollHeight }, "fast");
  }
  function scrollToBottomUser() {
    var chatContainer = $("#loadChat");
    chatContainer.animate({ scrollTop: chatContainer[0].scrollHeight }, "fast");
  }
});
