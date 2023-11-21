<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body class="flex flex-col min-h-screen">
    <div class="flex-grow">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/public/jms.png" class="w-20 h-20" alt="no image" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">E-Shop</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/public/<?= (isset($image))? $image : "" ?>" alt="/public/profile.png">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white text-center"><?= (isset($username))? $username : "NO USER LOGGED IN" ?></span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400 text-center"><?= (isset($email))? $email : "<a href='/userprofile' style='color: red'>Add</a> an email and verify." ?></span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/profile" class="flex flex-row gap-2 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <svg class="w-4 h-4 mt-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                                        <path d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                                    </svg>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="/orders" class="flex flex-row gap-2 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <svg class="w-4 h-4 mt-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                                    </svg>
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="/settings" class="flex flex-row gap-2 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <svg class="w-4 h-4 mt-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
                                    </svg>    
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="/logout" class="flex flex-row gap-2 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <svg class="w-4 h-4 mt-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3"/>
                                    </svg>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                About
                            </a>
                        </li>
                        <li>
                            <a href="/services" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mx-auto p-8 text-center">
        <h1 class="text-4xl font-bold mb-8">Privacy & Policies</h1>
        <div class="grid grid-cols-1 md-grid-cols-2 lg:grid-cols-2 gap-8 border-t-4">
            <section class="mb-8">
                <h2 class="mt-3 text-2xl font-bold mb-4">Privacy Policy</h2>
                <p>At JMS E-SHOP, accessible from jms-eshop.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by JMS E-SHOP and how we use it.</p>

                <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in JMS E-SHOP. This policy is not applicable to any information collected offline or via channels other than this website.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Consent</h2>

                <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Information we collect</h2>

                <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
                <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">How we use your information</h2>

                <p>We use the information we collect in various ways, including to:</p>

                <ul>
                <li>Provide, operate, and maintain our website</li>
                <li>Improve, personalize, and expand our website</li>
                <li>Understand and analyze how you use our website</li>
                <li>Develop new products, services, features, and functionality</li>
                <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                <li>Send you emails</li>
                <li>Find and prevent fraud</li>
                </ul>

                <h2 class="mt-3 text-2xl font-bold mb-4">Log Files</h2>

                <p>JMS E-SHOP follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Cookies and Web Beacons</h2>

                <p>Like any other website, JMS E-SHOP uses "cookies". These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.</p>



                <h2 class="mt-3 text-2xl font-bold mb-4">Advertising Partners Privacy Policies</h2>

                <P>You may consult this list to find the Privacy Policy for each of the advertising partners of JMS E-SHOP.</p>

                <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on JMS E-SHOP, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                <p>Note that JMS E-SHOP has no access to or control over these cookies that are used by third-party advertisers.</p>
            </section>
            
            <section class="mb-8">
                
                <h2 class="mt-3 text-2xl font-bold mb-4">Third Party Privacy Policies</h2>

                <p>JMS E-SHOP's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. </p>

                <p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>

                <p>Under the CCPA, among other rights, California consumers have the right to:</p>
                <p>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>
                <p>Request that a business delete any personal data about the consumer that a business has collected.</p>
                <p>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
                <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">GDPR Data Protection Rights</h2>
                <p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>
                <p>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>
                <p>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>
                <p>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
                <p>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>
                <p>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</p>
                <p>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>
                <p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Children's Information</h2>

                <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                <p>JMS E-SHOP does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Changes to This Privacy Policy</h2>

                <p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>

                <p>Our Privacy Policy was created with the help of the <a href="https://www.termsfeed.com/privacy-policy-generator/">Privacy Policy Generator</a>.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">Contact Us</h2>

                <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>
            </section>
        </div>
        <div class="grid grid-cols-1 md-grid-cols-2 lg:grid-cols-2 gap-8 border-t-4">
            <section class="mb-8">.
                <h1 class="mt-3 text-3xl font-extrabold mb-4">Website Terms and Conditions of Use</h1>

                <h2 class="mt-3 text-2xl font-bold mb-4">1. Terms</h2>

                <p>By accessing this Website, accessible from jms-eshop.com, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">2. Use License</h2>

                <p>Permission is granted to temporarily download one copy of the materials on Joemar MotorParts &amp; Services's Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>

                <ul>
                    <li>modify or copy the materials;</li>
                    <li>use the materials for any commercial purpose or for any public display;</li>
                    <li>attempt to reverse engineer any software contained on Joemar MotorParts &amp; Services's Website;</li>
                    <li>remove any copyright or other proprietary notations from the materials; or</li>
                    <li>transferring the materials to another person or "mirror" the materials on any other server.</li>
                </ul>

                <p>This will let Joemar MotorParts &amp; Services to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format. These Terms of Service has been created with the help of the <a href="https://www.termsofservicegenerator.net">Terms Of Service Generator</a>.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">3. Disclaimer</h2>

                <p>All the materials on Joemar MotorParts &amp; Services's Website are provided "as is". Joemar MotorParts &amp; Services makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, Joemar MotorParts &amp; Services does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.</p>
            </section>
            <section class="mb-8">
        
                <h2 class="mt-3 text-2xl font-bold mb-4">4. Limitations</h2>

                <p>Joemar MotorParts &amp; Services or its suppliers will not be hold accountable for any damages that will arise with the use or inability to use the materials on Joemar MotorParts &amp; Services's Website, even if Joemar MotorParts &amp; Services or an authorize representative of this Website has been notified, orally or written, of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for incidental damages, these limitations may not apply to you.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">5. Revisions and Errata</h2>

                <p>The materials appearing on Joemar MotorParts &amp; Services's Website may include technical, typographical, or photographic errors. Joemar MotorParts &amp; Services will not promise that any of the materials in this Website are accurate, complete, or current. Joemar MotorParts &amp; Services may change the materials contained on its Website at any time without notice. Joemar MotorParts &amp; Services does not make any commitment to update the materials.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">6. Links</h2>

                <p>Joemar MotorParts &amp; Services has not reviewed all of the sites linked to its Website and is not responsible for the contents of any such linked site. The presence of any link does not imply endorsement by Joemar MotorParts &amp; Services of the site. The use of any linked website is at the user's own risk.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">7. Site Terms of Use Modifications</h2>

                <p>Joemar MotorParts &amp; Services may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">8. Your Privacy</h2>

                <p>Please read our Privacy Policy.</p>

                <h2 class="mt-3 text-2xl font-bold mb-4">9. Governing Law</h2>

                <p>Any claim related to Joemar MotorParts &amp; Services's Website shall be governed by the laws of ph without regards to its conflict of law provisions.</p>

            </section>
        </div>
    </div>

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4 mt-auto">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/public/jms.png" class="w-20 h-20" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">E-Shop</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="/about" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="/policies" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/licensing" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="/contact" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">AmpelDevs™</a>. All Rights Reserved.</span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
</body>
</html>