import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function UserQuotes({ page, sources, user, name }) {
    return (
        <div className="text-left">
            <SectionTitle title={`All saved quotes from ${name}`} />
            <QuotesContainer type="user" page={page} user={user} sources={sources} />
        </div>
    );
}
