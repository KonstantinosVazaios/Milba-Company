var barcode = '';
var interval;
var finishedBar;
document.addEventListener('keydown', function(e) {

    if (interval) {
        clearInterval(interval);
    }
    if (e.code === 'Enter') {
        if (barcode) {
            finishedBar = barcode.replace(/Digit/g, '').replace(/Period/g, '').replace(/Key/g, '').replace(/Space/g, ' ');
            handleFetchUser(finishedBar);
        }
        barcode = '';
        return;
    }
    if (e.key === 'Space') {
        barcode += ' ';
    }
    if (e.key !== 'Shift') {
        barcode += e.code;
    }
    interval = setInterval(() => barcode = '', 20);
});

function handleFetchUser(barcode) {
    fetch(`/api/admin/users/${barcode}`)
        .then(res => res.json())
        .then(data => data.status == 200 ? handleShowUser(data) : handleNotFound())
}

function handleShowUser(data) {
    const name = document.getElementById('name')
    const patronym = document.getElementById('patronym')
    const telephone = document.getElementById('telephone')
    const email = document.getElementById('email')
    const barcode = document.getElementById('barcode')
    const birthday = document.getElementById('birthday')
    const registrationDate = document.getElementById('registration_date')
    const profilePicture = document.getElementById('profile_picture')

    name.innerHTML = data.user.name
    patronym.innerHTML = data.user.patronym
    telephone.innerHTML = data.user.telephone
    email.innerHTML = data.user.email
    barcode.innerHTML = data.user.barcode
    birthday.innerHTML = data.user.date_of_birth
    registrationDate.innerHTML = data.created_at

    if (data.user.image_path) {
        profilePicture.src = `/storage/${data.user.image_path}`
    }

    const bookingsContainer = document.getElementById('bookingsContainer')
    bookingsContainer.innerHTML = ""

    data.bookings.forEach((booking) => {
        const bookingContainerTheme = document.getElementById('booking-container-theme')
        const bookingCont = bookingContainerTheme.cloneNode(true)

        bookingCont.children[0].children[1].textContent = booking.workout.title
        bookingCont.children[1].children[1].textContent = booking.date
        bookingCont.children[2].children[1].textContent = `${booking.start_hour} - ${booking.end_hour}`

        bookingCont.classList.remove('d-none')
        bookingsContainer.appendChild(bookingCont)
    })

    const modalBtn = document.getElementById('modal-btn')
    modalBtn.click()
}

function handleNotFound() {
    const modalBtn = document.getElementById('notfound-btn')
    modalBtn.click()
}