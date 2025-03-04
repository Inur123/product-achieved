@extends('frontend.layouts.app')
<!-- Transaction Status Section -->

<section class="py-20 bg-white ">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-6 text-center">Check Your Transaction</h3>
                <form class="max-w-md mx-auto">
                    <div class="mb-4">
                        <label for="transaction-id" class="block text-gray-700 font-semibold mb-2">Transaction ID</label>
                        <input type="text" id="transaction-id"
                            placeholder="Enter your transaction ID (e.g., KID-2025-...)"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <button type="button"
                        class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition">Check
                        Status</button>
                </form>
            </div>


            <!-- Transaction Details Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8 transaction-card">
                <h3 class="text-2xl font-bold mb-6 text-center">Transaction Details</h3>

                <p class="text-gray-500 mb-6 flex items-center">
                    Transaction ID:
                    <span id="transaction-id" class="font-bold text-dark ml-2">KID-2025-03-05-78422</span>
                    <!-- Ikon untuk copy -->
                    <button id="copy-button" class="ml-2 text-gray-500 hover:text-primary focus:outline-none relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        <!-- Feedback "Copied" -->
                        <span id="copy-feedback" class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-sm px-2 py-1 rounded opacity-0 transition-opacity duration-300">
                            Copied
                        </span>
                    </button>
                </p>
                <div class="mb-6">
                    <h4 class="text-lg font-semibold mb-3">Order Status</h4>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-success bg-green-200">
                                    Completed
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-success">
                                    100%
                                </span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                            <div style="width: 100%"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-success animate-progress">
                            </div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500">
                            <span>Order Placed</span>
                            <span>Payment Confirmed</span>
                            <span>Processing</span>
                            <span>Ready for Download</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="text-lg font-semibold mb-3">Customer Information</h4>
                        <p class="text-gray-700 mb-1">Sarah Johnson</p>
                        <p class="text-gray-700 mb-1">sarah.johnson@example.com</p>
                        <p class="text-gray-700">+1 (555) 123-4567</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-3">Order Summary</h4>
                        <p class="text-gray-700 mb-1">Date: March 5, 2025</p>
                        <p class="text-gray-700 mb-1">Items: 3 e-books</p>
                        <p class="text-gray-700">Total: $29.97</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <h4 class="text-lg font-semibold mb-3">Purchased Items</h4>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-gray-200 rounded-md overflow-hidden mr-4">
                                <img src="1.jpeg" alt="IELTS Junior Prep" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h5 class="font-semibold">IELTS Junior Prep</h5>
                                <p class="text-gray-500 text-sm">Fun exercises to prepare children for IELTS exams.</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-primary">$12.99</p>
                                <a href="#"
                                    class="text-secondary text-sm font-semibold hover:underline">Download</a>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-gray-200 rounded-md overflow-hidden mr-4">
                                <img src="1.jpeg" alt="Science Experiments at Home"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h5 class="font-semibold">Science Experiments at Home</h5>
                                <p class="text-gray-500 text-sm">50 safe and fun experiments kids can do at home.</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-primary">$9.99</p>
                                <a href="#"
                                    class="text-secondary text-sm font-semibold hover:underline">Download</a>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-16 h-16 bg-gray-200 rounded-md overflow-hidden mr-4">
                                <img src="1.jpeg" alt="Math Adventures" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h5 class="font-semibold">Math Adventures</h5>
                                <p class="text-gray-500 text-sm">Making math fun through stories and puzzles.</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-primary">$6.99</p>
                                <a href="#"
                                    class="text-secondary text-sm font-semibold hover:underline">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Transaction Statuses -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 transaction-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-success rounded-full flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg">Successful Transaction</h4>
                            <p class="text-gray-500 text-sm">Your payment has been processed successfully</p>
                        </div>
                    </div>
                    <div class="pl-16">
                        <p class="text-gray-700 mb-1">• Payment received</p>
                        <p class="text-gray-700 mb-1">• Order processed</p>
                        <p class="text-gray-700 mb-1">• E-books ready for download</p>
                        <p class="text-gray-700">• Receipt sent to your email</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 transaction-card">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-pending rounded-full flex items-center justify-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg">Pending Transaction</h4>
                            <p class="text-gray-500 text-sm">Your payment is being processed</p>
                        </div>
                    </div>
                    <div class="pl-16">
                        <p class="text-gray-700 mb-1">• Payment verification in progress</p>
                        <p class="text-gray-700 mb-1">• Order on hold</p>
                        <p class="text-gray-700 mb-1">• E-books will be available soon</p>
                        <p class="text-gray-700">• Check back in a few minutes</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#"
                    class="bg-secondary text-white font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition text-center">Go
                    to My Library</a>
                <a href="#"
                    class="bg-primary text-white font-bold py-3 px-8 rounded-full hover:bg-opacity-90 transition text-center">Continue
                    Shopping</a>
            </div>
        </div>
    </div>
</section>

<!-- Need Help Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Need Help With Your Order?</h2>
            <p class="text-gray-700 mb-8 text-lg">Our customer support team is here to assist you with any questions or
                concerns.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Email Support</h3>
                    <p class="text-gray-600 mb-4">Send us an email and we'll respond within 24 hours.</p>
                    <a href="mailto:support@kiddibooks.com"
                        class="text-primary font-bold hover:underline">support@kiddibooks.com</a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Phone Support</h3>
                    <p class="text-gray-600 mb-4">Call us Monday-Friday, 9am-5pm EST.</p>
                    <a href="tel:+15551234567" class="text-secondary font-bold hover:underline">+1 (555) 123-4567</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-light rounded-lg p-6 cursor-pointer" onclick="toggleFAQ(1)">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">How long does it take to process my order?</h3>
                        <span id="arrow-1" class="transform transition-transform duration-200">
                            <!-- Tanda panah ke bawah (default) -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    <p id="answer-1" class="text-gray-700 mt-2 hidden">
                        Most orders are processed immediately after payment confirmation. You should be able to download
                        your e-books within minutes of completing your purchase.
                    </p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-light rounded-lg p-6 cursor-pointer" onclick="toggleFAQ(2)">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">What if my transaction is pending for a long time?</h3>
                        <span id="arrow-2" class="transform transition-transform duration-200">
                            <!-- Tanda panah ke bawah (default) -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    <p id="answer-2" class="text-gray-700 mt-2 hidden">
                        If your transaction remains in the "pending" status for more than 30 minutes, please contact our
                        customer support team with your transaction ID for assistance.
                    </p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-light rounded-lg p-6 cursor-pointer" onclick="toggleFAQ(3)">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">How can I access my purchased e-books?</h3>
                        <span id="arrow-3" class="transform transition-transform duration-200">
                            <!-- Tanda panah ke bawah (default) -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    <p id="answer-3" class="text-gray-700 mt-2 hidden">
                        Once your transaction is complete, you can access your e-books in "My Library" section of your
                        account. You'll also receive download links via email.
                    </p>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-light rounded-lg p-6 cursor-pointer" onclick="toggleFAQ(4)">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">What payment methods do you accept?</h3>
                        <span id="arrow-4" class="transform transition-transform duration-200">
                            <!-- Tanda panah ke bawah (default) -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </div>
                    <p id="answer-4" class="text-gray-700 mt-2 hidden">
                        We accept all major credit cards, PayPal, and Apple Pay. All transactions are secure and
                        encrypted for your protection.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFAQ(id) {
        const answer = document.getElementById(`answer-${id}`);
        const arrow = document.getElementById(`arrow-${id}`);

        // Toggle visibility of the answer
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            // Ganti dengan tanda panah ke atas
            arrow.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
            </svg>
        `;
        } else {
            answer.classList.add('hidden');
            // Ganti dengan tanda panah ke bawah
            arrow.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        `;
        }
    }
</script>
<script>
    // Ambil elemen Transaction ID, tombol copy, dan feedback
    const transactionIdElement = document.getElementById('transaction-id');
    const copyButton = document.getElementById('copy-button');
    const copyFeedback = document.getElementById('copy-feedback');

    // Tambahkan event listener untuk klik tombol copy
    copyButton.addEventListener('click', () => {
        // Ambil teks Transaction ID
        const transactionId = transactionIdElement.innerText;

        // Copy teks ke clipboard
        navigator.clipboard.writeText(transactionId)
            .then(() => {
                // Tampilkan feedback "Copied"
                copyFeedback.classList.remove('opacity-0');
                copyFeedback.classList.add('opacity-100');

                // Sembunyikan feedback setelah 2 detik
                setTimeout(() => {
                    copyFeedback.classList.remove('opacity-100');
                    copyFeedback.classList.add('opacity-0');
                }, 500);
            })
            .catch((err) => {
                console.error('Failed to copy: ', err);
            });
    });
</script>
