<x-app-layout>

    <style>
        .balanceSheetForm {
    max-width: 600px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

form {
    width:40%;
    display: flex;
    flex-direction: column;
}

label {
    margin: 10px 0 5px;
}

input {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007BFF;
    color: white;
    margin-top: 10px;
}

button[type="reset"] {
    background-color: #dc3545;
}

button:hover {
    opacity: 0.9;
}

#results {
    margin-top: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    display: none;
}

#results h2 {
    margin-top: 0;
}

#results p {
    margin: 5px 0;
}


.datainsert{
    padding: 20px 40px;
    display: flex;
    width: 100%;
    justify-content: space-around;
    flex-direction: row;
    align-items: center;
    flex-wrap: nowrap;
}
    </style>

    <body>
        @if(session('success'))
                <p id="successMessage"  style="color: green;position: absolute;right: 28px;font-size: 18px;font-weight: 800;">{{ session('success') }}</p>
        @endif
        <script>
        setTimeout(() => {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 10000);
        </script>
        
    <div class="datainsert">
        <form action="{{ route('dashboard.store') }}" method="POST" id="balanceSheetForm">
            @csrf
            <label for="date">Month:</label>
            <input type="date" name="date" required>

            <label for="salary">Monthly Salary:</label>
            <input type="number" name="salary" placeholder="Enter your salary" required>

            <label for="food_expenses">Food Expenses:</label>
            <input type="number" name="food_expenses" placeholder="Enter food expenses" required>

            <label for="home_rent">Home Rent:</label>
            <input type="number" name="home_rent" placeholder="Enter home rent" required>

            <label for="transportation">Transportation Expenses:</label>
            <input type="number" name="transportation" placeholder="Enter transportation expenses" required>

            <label for="medicine">Medicine:</label>
            <input type="number" name="medicine" placeholder="Enter medicine expenses" required>

            <button type="submit">Calculate & Save</button>
        </form>


        <div id="datashow">
            <h2>Balance Sheet Summary on current month</h2>
            <input type="month" id="month" name="month" required>
            <p id="totalExpenses">Total Earning:  </p>
            <p id="remainingBalance">Remaining Balance : </p>
        </div>
   

    </div>

    
</body>

    
</x-app-layout>
