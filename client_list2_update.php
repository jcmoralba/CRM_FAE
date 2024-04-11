

<!-- FOR DELETE MODAL -->
<div id="delete-modal<?php echo $row['prospect_id']; ?>" class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="delete-modal<?php echo $row['prospect_id']; ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
           
        


            adwad
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-hide="delete-modal<?php echo $row['prospect_id']; ?>" type="button" class="py-2 px-3 text-sm font-medium text-black bg-white rounded-lg border border-gray-200 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 ">
                        No, cancel
                    </button>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 " name="deletedata">
                        Yes, I'm sure
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FOR DELETE MODAL -->