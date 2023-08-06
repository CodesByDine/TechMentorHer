const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");

let userMessage;
const API_KEY = "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";

const createChatLi = (message, className) => {
  /* <div class="chat outgoing">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div> */
  const chatLi = document.createElement("li");
  chatLi.classList.add("chat", className);
  let chatContent =
    className === "outgoing"
      ? `<p>${message}</p>`
      : `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;

  chatLi.innerHTML = chatContent;
  return chatLi;
};

const generateResponse = (incomingChatLI) => {
  const API_URL = "https://api.openai.com/v1/chat/completions";
  const messageElement = incomingChatLI.querySelector("p");

  const requestOptions = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: `Bearer ${API_KEY}`,
    },
    body: JSON.stringify({
      model: "gpt-3.5-turbo",
      messages: [{ role: "user", content: userMessage }],
    }),
  };

  //Send POST request to API, get response
  fetch(API_URL, requestOptions)
    .then((res) => res.json())
    .then((data) => {
      messageElement.textContent = data.choices[0].message.content;
    })
    .catch((error) => {
      messageElement.textContent =
        "Oops! Something went wrong. Please try again later";
    });
};

const handleChat = () => {
  userMessage = chatInput.value.trim();
  if (!userMessage) return;

  //Append the user's meessage to the chatbox
  chatbox.appendChild(createChatLi(userMessage, "outgoing"));

  setTimeout(() => {
    //Display "Thinking....." message while waiting for the response
    const incomingChatLI = createChatLi("Thinking.....", "incoming");
    chatbox.appendChild(incomingChatLI);
    generateResponse(incomingChatLI);
  }, 600);
};

chatbotToggler.addEventListener("click", () =>
  document.body.classList.toggle("show-chatbot")
);
sendChatBtn.addEventListener("click", handleChat);
