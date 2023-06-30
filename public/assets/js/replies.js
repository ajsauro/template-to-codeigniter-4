    const btnReplies = document.querySelectorAll('.btn-reply');
    const btnSendReply = document.querySelector('#btn-send-reply');
    const modal = new bootstrap.Modal(document.getElementById('modal-comment'))
    const modalTitle = document.querySelector('.modal-title');
    btnReplies.forEach(btn => {
            btn.addEventListener('click', function() {
            modalTitle.textContent = this.textContent;
            btnSendReply.setAttribute('data-id', this.getAttribute('data-id'));
            modal.show();
        })
    });

    btnSendReply.addEventListener('click', async function() {
    const commentId = this.getAttribute('data-id');
    const modalText = document.querySelector('#modal-comment-text');
    if (!modalText.value.length) {
        alert('Digite uma resposta.');
        return;
    }

    this.textContent = 'Enviando reposta, agurade...';
    try {
        const data = await fetch('/api/reply', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({
            commentId: commentId,
            reply: modalText.value
            })
        })

        const response = await data.json();
        if (response.message === 'replied') {
            alert('Resposta efeturada.');
            this.innerHTML = "Send Replay <i class='bi bi-check'></i>";
            modalText.value = '';
        }

        setTimeout(() => {
            modal.hide();
        }, 1000)

    } catch (error) {
        console.log(error);
        setTimeout(() => {
            modal.hide();
            }, 1000)
        }
    });