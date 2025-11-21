        </main>
    </div>
    
    <!-- Modal for image preview -->
    <div id="imageModal" class="modal" onclick="hideModal()">
        <button class="modal-close" onclick="hideModal()">×</button>
        <img id="modalImage" src="" alt="Badge Preview">
    </div>
    
    <script>
        function showModal(imagePath) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imagePath;
            modal.classList.add('active');
        }
        
        function hideModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
        }
        
        // Prevent modal from closing when clicking on image
        document.getElementById('modalImage').addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideModal();
            }
        });
    </script>
</body>
</html>
