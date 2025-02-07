import React, { useState, useEffect } from 'react';
import axios from 'axios';
import ResponsivePagination from 'react-responsive-pagination';
// import 'react-responsive-pagination/themes/classic.css';
// import 'react-responsive-pagination/themes/minimal.css';
import QuotesGrid from '../components/quotes/QuotesGrid.jsx';

const urls = {
    all: '/api/quotes',
    my: '/api/quotes/my',
    source: '/api/quotes/source/',
    delete: '/api/quotes'
};

export default function QuotesContainer({ type, page, source }) {
    const [quotes, setQuotes] = useState(null);

    const [currentPage, setCurrentPage] = useState(parseInt(page, 10));
    const [totalPages, setTotalPages] = useState(null);

    function getQuotes(newPage) {
        axios.get(
            `${urls[type] || urls.all}?page=${newPage}`
        ).then(response => {
            setQuotes(response.data.quotes);

            setCurrentPage(newPage);
            setTotalPages(response.data.totalPages);

            window.history.pushState({}, '', `?page=${newPage}`);
        }).catch(error => {
            console.error(error.message);
        });
    }

    function deleteQuote(id) {
        axios.delete(
            `${urls.delete}/${id}`
        ).then(response => {
            if (response.data.status === 'ok') {
                getQuotes(currentPage);
            }
        }).catch(error => {
            console.error(error.message);
        });
    }

    useEffect(() => {
        if (type == 'source') {
            urls[type] += source; 
        }

        getQuotes(currentPage);
    }, []);

    return (
        <div>
            <QuotesGrid quotes={quotes} onDelete={deleteQuote} />
            {totalPages && totalPages > 1 && (
                <ResponsivePagination
                    current={currentPage}
                    total={totalPages}
                    onPageChange={(newPage) => getQuotes(newPage)}
                    className="flex justify-center m-2 mt-6"
                    pageItemClassName="border-b-2 border-white text-custom-primary-1 hover:bg-custom-primary-1 hover:text-white"
                    activeItemClassName="font-bold border-b-custom-primary-1"
                    disabledItemClassName="pointer-events-none"
                    pageLinkClassName="inline-block py-2 px-3"
                    previousClassName="rounded-l"
                    nextClassName="rounded-r"
                />
            )}
        </div>
    );
}
